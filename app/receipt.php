<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class receipt extends Model
{
    public function receipt_details()
    {
        return $this->hasMany('App\receipt_detail','rno','rno');
    }
}
