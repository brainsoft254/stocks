<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stockTran extends Model
{
    protected $table = "stock_trans";

    public function item()
    {
        return $this->belongsTo('App\items', 'code', 'code');
    }
}