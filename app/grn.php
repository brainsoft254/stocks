<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grn extends Model
{
    protected $table="grn";

     public function grn_d()
    {
        return $this->hasMany('App\grn_d','refno','refno');
    }
}
