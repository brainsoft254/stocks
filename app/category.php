<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function item(){
    	return $this->hasMany('App\item','category','code');
    }
}
