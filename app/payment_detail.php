<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_detail extends Model
{
    public function payment()
    {
        return $this->belongsTo('App\payment','refno','refno');
    }

}
