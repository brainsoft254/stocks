<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\client;
use App\items as item;
use App\discount;
use App\location;
use App\setting;
use App\stockTran as itrans;
use DB;
use App\order;
use App\order_detail;
use App\salesrep;

use Stockspro;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    private $selectedParent = '';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function initialData()
    {
        
        $clients = client::where('status', 1)->orderBy('code', 'asc')->get();
        $units = DB::table('units')->where('status', 1)->orderBy('code', 'desc')->get();
        $locations = location::where('status', 1)->orderBy('code', 'desc')->get();
        $discounts = discount::where('status', 1)->orderBy('code', 'asc')->get();
        $items = item::where('status', 1)->orderBy('code', 'asc')->get();
        $salesreps = salesrep::where('status', 1)->orderBy('code', 'asc')->get();
        $settings = setting::first();
        
        return ['clients' => $clients,'salesreps'=>$salesreps->pluck('name'), 'units' => $units, 'locations' =>
        $locations, 'discounts'
        => $discounts, 'vatrate' => $settings->vrate, 'items' => $items];
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clients()
    {
        $clients = client::where('status', 1)->get();
        
        return $clients;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function items(Request $request)
    {

        $this->parentSelected = $this->getParent($request->clientcode);
        $clItems = [];
        $items = item::where('status', 1)->get();

        foreach ($items as $item) {

            if ($this->isClientItem($item)) {
                $item->sprice = $this->getClientPrice($item);
                $item->description = $this->getItemDescrClient($item);
            } else {
                //return  $this->getClientPrice($item);
            }
            //            $item->itemTrans;
            
            array_push($clItems, $item);
        }
        
        return ['clItems' => $clItems, 'vatx' => $this->isVatable()];
    }
    
    public function getItemQty(Request $request)
    {
        $items = itrans::where(['location' => $request->location, 'code' => $request->icode])->get();
        return $items->sum(function ($item) {
            return $item->transign == '+' ? $item->qty : $item->qty * -1;
        });
    }
    
    private function getParent($selClient)
    {
        $client = client::where('code', $selClient)->first();
        return $client->attachedto != '' ? $client->attachedto : $client->code;
    }
    
    private function isVatable()
    {
        $client = client::where('code', $this->parentSelected)->first();
        return $client->vatexc ? 1 : 0;
    }
    
    private function isClientItem($item)
    {
        $clItem = $item->clientitems->filter(function ($value) use ($item) {
            return $value->itemcode == $item->code && $value->clcode == $this->parentSelected;
        })->count();
        
        
        
        return $clItem > 0 ? 1 : 0;
    }
    
    private  function getClientPrice($item)
    {
        try {
            $clItem = $item->clientitems->filter(function ($value) use ($item) {
                return $value->clcode == $this->parentSelected && $value->itemcode == $item->code;
            })->first();
            
            return $this->isVatable() ? round(($clItem->price * 100 / 116), 2) : $clItem->price;
        } catch (\Exception $e) {
            
            return $this->isVatable() ? round(($item->sprice * 100 / 116), 2) : $item->sprice;
            //dd($item);
        }
    }
    
    private function getItemDescrClient($item)
    {
        try {
            $fltItem = $item->clientitems->filter(function ($value) use ($item) {
                return $value->itemcode == $item->code && $value->clcode == $this->parentSelected;
            })->first();
            
            return isset($fltItem->description) ? $fltItem->description : $item->description;
        } catch (\Exception $e) {
            
            return $item->description;
        }
    }
    
    public function isOrdernoUsed(Request $request)
    {
        return order::where('refno', $request->refno)->count();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveOrder(Request $request)
    {
        
        $this->parentSelected = $this->getParent($request->master['clcode']);
        $vrate = Stockspro::vatRate();
        $tvrate = $vrate + 100;
        $dvrate = $vrate / 100;
        
        
        $order = new order;
        $order->refno = $request->master['refno'];
        $order->trandate = $request->master['trandate'];
        $order->clcode = $request->master['clcode'];
        $order->description = $request->master['remarks'];
        $order->location = $request->master['stockloc'];
        $order->total = $request->master['grosstotal'];
        $order->discount = $request->master['disctotal'];
        $order->discrate = $request->master['discrate'];
        $order->salesrep = $request->master['salesrep'];
        $order->voucherno = $request->master['voucherno'];
        
        if ($request->master['totalvat'] == "0") { //Added this line just to address the issues of VAT on vat less tree tomato product
            //It can be removed when the situatio  changes
            $order->tax = "0";
        } else {
            $order->tax = $request->master['totalvat']; //$this->isVatable() ? $request->master->grosstotal * $dvrate : $request->master->grosstotal * $vrate / $tvrate;
        }
        $order->staff = $request->master['staff'];;
        $order->save();
        
        foreach ($request->details as $item) {
            if ($item['itotal'] > 0) {
                $order_d = new order_detail;
                $order_d->refno = $request->master['refno'];
                $order_d->icode = $item['icode'];
                $order_d->description = $item['idescr'];
                $order_d->qty = $item['iqty'];
                $order_d->uom = $item['iuom'];
                $order_d->rate = $item['iprice'];
                if ($item['icode'] == "2035394000000") {
                    $order_d->vat = 0; //(Stockspro::isVatable($request->client)>0?$request->total[$i]*$dvrate:$request->total[$i]*$vrate/$tvrate);   
                } else {
                    $order_d->vat = $item['ivatamnt'];
                }
                $order_d->total = $item['itotal'];
                
                $order_d->save();
            }
        }
        
        Stockspro::auditLogVue("Sales Order-" . $request->refno . " Created
        Successfully",$request->master['staffname']);
        return "Sales Order-" . $request->refno . " Created Successfully";
    }
}