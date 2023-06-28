<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Stockspro;

class invoice extends Model
{
	protected $fillable=['locked'];
	
    public function invoice_details()
    {
    	return $this->hasMany('App\invoice_detail','invno','invno');
    }

    public function getNameAttribute()
    {
        return Stockspro::getClientName($this->clcode);
    }

    public function order()
    {
        return $this->belongsTo('App\order','invno','invno');
    }

    
}