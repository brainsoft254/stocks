<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client_tran extends Model
{
    protected $table = 'receivables_transactions';

    public function client()
    {
        return $this->belongsTo('App\client', 'code', 'code');
    }
}