<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'ean' => $faker->ean13,
        'price' => $faker->numberBetween(100, 30000),
        'discount_price' => $faker->numberBetween(100, 30000),
        'name' => $faker->words(4, true),
        'description' => $faker->text(300)
    ];
});
