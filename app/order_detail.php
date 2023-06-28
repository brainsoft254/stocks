<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    public function order()
    {
        return $this->belongsTo('App\order','refno','refno');
    }
}
