<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use App\Annonce;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'name' => $faker->imageUrl,
        'annonce_id' => function(){
        	return Annonce::all()->random();
        },
    ];
});
