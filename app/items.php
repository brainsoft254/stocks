<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
   public function category(){
    	return $this->belongsTo('App\category','code','category');
    }

    public function itemTrans()
    {
        return $this->hasMany('App\stockTran', 'code', 'code');
    }

    public function getQtyAttribute()
    {
        return $this->itemTrans->where('location', 'JD002')->sum(function ($item) {
            return $item->transign == '+' ? $item->qty : $item->qty * -1;
        });
    }

    public function Clients()
    {
        return $this->hasManyThrough('App\client', 'App\client_item', 'itemcode', 'code', 'code', 'clcode');
    }

    public function clientitems()
    {
        return $this->hasMany('App\client_item', 'itemcode', 'code');
    }
}