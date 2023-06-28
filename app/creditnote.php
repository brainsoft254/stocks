<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\CreditnoteCreatedEvent;
use App\Events\CreditnoteUpdatedEvent;
use Illuminate\Notifications\HasDatabaseNotifications;
use Illuminate\Notifications\Notifiable;

class creditnote extends Model
{
	use Notifiable, HasDatabaseNotifications;

	protected $dispatchesEvents = [
		'saved' => CreditnoteCreatedEvent::class,
		'updated' => CreditnoteUpdatedEvent::class,
	];

	public function creditnote_d()
	{
		return $this->hasMany('App\creditnote_detail','refno','refno');
	}
}