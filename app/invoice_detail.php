<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_detail extends Model
{
   public function invoice()
   {
   	return $this->belongsTo("App\invoice","invno","invno");
   }
}
