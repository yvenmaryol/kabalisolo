<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Like;
use App\User;
use App\Annonce;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'user_id' => function(){
        	return User::all()->random();
        },
        'annonce_id' => function(){
        	return Annonce::all()->random();
        },
        'like' => $faker->numberBetween($min = 0, $max = 1),
    ];
});
