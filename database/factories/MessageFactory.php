<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Annonce;
use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'from_user_id' => function(){
        	return User::all()->random();
        },
        'to_user_id' => function(){
        	return User::all()->random();
        },
        'annonce_id' => function(){
        	return Annonce::all()->random();
        },
        'message' => $faker->paragraph,
    ];
});
