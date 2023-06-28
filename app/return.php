<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class return extends Model
{
	public function return_details()
	{
		return $this->hasMany('App\return_detail','refno','refno');
	}
}
