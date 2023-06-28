<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client_item extends Model
{
    public function client()
    {
        return $this->belongsTo('App\client','code','clcode');
    }

    public function item()
    {
        return $this->belongsTo('App\items', 'code', 'itemcode');
    }

}