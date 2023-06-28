<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sreturn_detail extends Model
{
    public function returns()
	{
		return $this->belongsTo("App\sreturn","refno","refno");
	}
}
