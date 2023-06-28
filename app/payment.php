<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public function payment_details()
    {
        return $this->hasMany('App\payment_detail','refno','refno');
    }

}
