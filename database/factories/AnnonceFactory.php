<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\User;
use App\Annonce;
use App\Subcategory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Annonce::class, function (Faker $faker) {
    $titre = $faker->text($maxNbChars = 70) ;
    return [
        'title' => $titre,
        'description' => $faker->text,
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'object' => $faker->numberBetween($min = 0, $max = 1),
        'tags' => $faker->word,
        'slug' => Str::slug($titre),
        'user_id' => function(){
        	return User::all()->random();
        },
        'subcategory_id' => function(){
        	return Subcategory::all()->random();
        },
        'city_id' => function(){
        	return City::all()->random();
        },
    ];
});
