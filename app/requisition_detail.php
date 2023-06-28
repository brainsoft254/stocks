<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class requisition_detail extends Model
{
	public function requisition()
	{
		return $this->belongsTo('App\requisition','refno','refno');
	}
}
