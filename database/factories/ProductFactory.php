<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
	$title = $faker->unique()->sentence(2);
	$slug = Str::of($title)->slug('-');
    return [
        'product_name' => $title,
        'slug'=> $slug,
        'prod_desc' => $faker->realText(300),
        'price' => $faker->numberBetween(99,999),
        'brand' => $faker->sentence(1),
        'local_name' => $faker->unique()->sentence(2),
        'SKU' => $faker->unique()->numerify('ABC###'),
        'maket_price' => $faker->numberBetween(200,999),
        'supplier_id' => $faker->unique()->numerify('ABC###'),
        'supplier_price' => $faker->numberBetween(99,777),
        'dis_price' => $faker->numberBetween(55,222)        
    ];
});
