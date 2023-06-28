<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\telegram as tgram;
use Telegram;
use Ixudra\Curl\Facades\Curl;
use DB;
use App\creditnote;
use App\sreturn;
use Stockspro;

class TelegramBotController extends Controller
{

    public function possible()
    {
        return 'Its Possible';
    }

    public function getUpdates(Request $request)
    {

        // dd((object)$request->callback_query);

        // [
        //     'text'       => 'OK',
        //     'show_alert' => true,
        // ]
        //dd(env('TELEGRAM_CHAT_ID'));
        if (collect($request)->has('callback_query')) {
            $update = (object)$request->callback_query;
            $msg = (object)$update->message;

            $cb = [
                'call_back_id' => $update->id,
                'data' => $update->data,
                'message_id' => $msg->message_id,
            ];

            $dataReceived = explode('_', $update->data);
            switch ($dataReceived[0]) {
                case 'creditnote':
                    $post = $this->approveCreditnote($dataReceived[1]);
                    break;
                case 'returns':
                    $post = $this->approveReturn($dataReceived[1]);
                    break;
                default:
                    $post = $this->approveCreditnote($dataReceived[1]);
                    break;
            }

          
            $text = json_decode($post)->msg;

            Telegram::answerCallbackQuery([
                'callback_query_id' => $update->id,
                'text' => $text,
                'show_alert' => true,
                'cache_time' => 30,
            ]);

            if (json_decode($post)->flag == 1 || json_decode($post)->flag == 0) {

                Telegram::deleteMessage(['chat_id' => env('TELEGRAM_CHAT_ID', '-1001226410585'),
                    'message_id' => $msg->message_id
                ]);
            }

            $update = new tgram;
            $update->updates = collect($cb);
            $update->save();
        } else {
            $update = new tgram;
            $update->updates = collect($request->all())->toJson();
        $update->save();
        }
    }

    public function approveCreditnote($id)
    {


        $resp = "";
        try {
            $crnote = creditnote::findorFail($id);

            if ($crnote->status > 0) {
                $resp = array('flag' => 0, 'msg' => "Sorry !, Creditnote Already posted ");
                return json_encode($resp);
            }

            DB::select("call do_post_creditnote('" . $crnote->refno . "','" . 'Telegram Bot' . "',1)");
            $resp = array('flag' => 1, 'msg' => "Creditnote Posted Successfully!");

            return json_encode($resp);
        } catch (\Throwable $th) {
            $resp = array('flag' => 404, 'msg' => $th->getMessage());

            return json_encode($resp);
        }
    }

    public function approveReturn($id)
    {


        $resp = "";
        try {
            $ret = sreturn::findorFail($id);

            if ($ret->status > 0) {
                $resp = array('flag' => 0, 'msg' => "Sorry !, Order Already posted ");
                return json_encode($resp);
            }

            DB::select("call do_post_returns('" . $ret->refno . "','Telegram Bot',1)");

            Stockspro::auditLog("Stock return with refno " . $ret->refno . " from Invno ~" . $ret->invno . " Posted Successfully");
            $resp = array('flag' => 1, 'msg' => "Return Posted Successfully!");

            return json_encode($resp);
        } catch (\Throwable $th) {
            $resp = array('flag' => 404, 'msg' => $th->getMessage());

            return json_encode($resp);
        }
    }


    public function listUpdates()
    {
        $resp = tgram::all()->sortByDesc('id');
        return $resp->map(function ($item, $key) {
            return json_decode($item->updates);
        });
    }

    
    public function setWebHuk()
    {
        // $response = Curl::to("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . "/deleteWebhook")->get();
        // return $response;

        $resp = Telegram::setWebhook(['url' => 'https://joedream.stockcity.co.ke/api/receiveupdates']);
        return collect($resp)->__toString();
    }

    public function rett()
    {
        try {
            $items = "";
            $ret = \App\sreturn::all()->first();

            $items = $ret->return_details->pluck('qty', 'icode')->pipe(function ($item) {
                return $item . "\n\r";
            });
            return json_encode($items);
            //code...
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}