<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(Subcategory::class, function (Faker $faker) {
    $name = $faker->name; 
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'category_id' => function(){
        	return Category::all()->random();
        },
    ];
});
