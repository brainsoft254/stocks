<?php

namespace App;

use App\Events\ReturnCreatedEvent;
use App\Events\ReturnUpdatedEvent;
use Illuminate\Database\Eloquent\Model;

class sreturn extends Model
{
	protected $table="returns";

	protected $dispatchesEvents = [
		'saved' => ReturnCreatedEvent::class,
		'updated' => ReturnUpdatedEvent::class,
	];


	public function return_details()
	{
		return $this->hasMany('App\sreturn_detail','refno','refno');
	}
}