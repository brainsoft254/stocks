<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class issue_detail extends Model
{
   public function issue()
   {
   	return $this->belongsTo("App\issue","refno","refno");
   }
}
