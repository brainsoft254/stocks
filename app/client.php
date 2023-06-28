<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    public function client_item()
    {
        return $this->hasMany('App\client_item','clcode','code');
    }

    public function clientitems()
    {
        return $this->hasMany('App\client_item', 'clcode', 'code');
    }

    public function transactions()
    {
        return $this->hasMany('App\client_tran', 'code', 'code');
    }

    public function getBalanceAttribute()
    {
        return $this->transactions->sum(function ($item) {
            return $item->transign == '+' ? $item->amount : $item->amount * -1;
        });
    }
}