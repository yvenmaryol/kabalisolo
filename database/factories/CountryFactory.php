<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    $country = $faker->country; 
    return [
        'name' => $country,
        'slug' => Str::slug($country),
        'indicatif' => $faker->buildingNumber
    ];
});
