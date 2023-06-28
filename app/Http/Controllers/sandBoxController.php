<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stockspro;

class sandBoxController extends Controller
{
    public function init()
    {
        ///return Stockspro::vatRate();
        //php artisan migrate 
        //$output = new BufferedOutput;
        // Artisan::call("backup:run");
       // Artisan::call("optimize");
        //Artisan::call("php artisan view:clear");
        //Artisan::call("php artisan cache:clear");
        //Artisan::call("config:cache");
        //Artisan::call("migrate:rollback");
        //Artisan::call("migrate");
        // Artisan::call("inspire");
        //Artisan::call("backup:run");
        // $output = Artisan::output();
        // dd($output);

        return Stockspro::getRandomCat();
    }
}