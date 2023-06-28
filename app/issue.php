<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    public function issue_details()
    {
    	return $this->hasMany('App\issue_detail','refno','refno');
    }

}
