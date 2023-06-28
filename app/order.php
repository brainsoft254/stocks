<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded=[];
    public function order_details()
    {
        return $this->hasMany('App\order_detail','refno','refno');
    }
    public function invoice(){
        return $this->hasOne('App\invoice','invno','invno');
    }
}
