<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\User;
use App\Profil;
use Faker\Generator as Faker;

$factory->define(Profil::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return User::all()->random();
        },
        'adress' => $faker->address,
        'nom' => $faker->firstNameFemale,
        'prenom' => $faker->lastName,
        'city_id' => function(){
        	return City::all()->random();
        },
    ];
});
