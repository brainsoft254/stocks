<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class creditnote_detail extends Model
{
	public function creditnote()
	{
		return $this->belongsTo('App\creditnote','refno','refno');
	}

}
