<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $fillable = 
	[
		"vat",
		"receivables",
		"payables",
		"stocks",
		"returns",
		"vat_inclusive",
		"wtax",
		"factax",
		"vrate"

	];
}
