<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\salesrep;
use Faker\Generator as Faker;

$factory->define(salesrep::class, function (Faker $faker) {
    return [
        'code'=>$faker->swiftBicNumber,
        'name'=>$faker->name,
        'cellphone'=>$faker->e164PhoneNumber,        
        'email'=>$faker->email,        
              
        'status'=>1,        
    ];
});