<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grn_d extends Model
{
    protected $table="grn_d";

    public function grn()
    {
        return $this->belongsTo('App\grn','refno','refno');
    }
}
