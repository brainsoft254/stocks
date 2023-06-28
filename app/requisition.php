<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requisition extends Model
{
	public function req_details()
	{
		return $this->hasMany('App\requisition_detail','refno','refno');
	}
}
