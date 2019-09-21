<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Country;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    $city = $faker->city; 
    return [
        'name' => $city,
        'slug' => Str::slug($city),
        'country_id' => function(){
        	return Country::all()->random();
        },
    ];
});
