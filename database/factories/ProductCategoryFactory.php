<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductCategory;
use Faker\Generator as Faker;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,50),
        'category_id'=> $faker->numberBetween(1,50),
    ];
});
