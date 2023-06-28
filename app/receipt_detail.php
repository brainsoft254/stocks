<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class receipt_detail extends Model
{
	public function receipt()
	{
		return $this->belongsTo("App\receipt","rno","rno");
	}
}
