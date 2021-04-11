<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\products;
use App\productsimages;
use App\productsvariants;


use Faker\Generator as Faker;

$factory->define(products::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(1000, 15000),
        'stock' => $faker->randomElement(['in', 'out'])
    ];
});

$factory->define(productsimages::class, function (Faker $faker) {
    return [
        'source' =>$faker->randomElement([
            "https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
            "https://images.pexels.com/photos/335257/pexels-photo-335257.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
            "https://images.pexels.com/photos/4041392/pexels-photo-4041392.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260",
            "https://images.pexels.com/photos/2928381/pexels-photo-2928381.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
            "https://images.pexels.com/photos/3907507/pexels-photo-3907507.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260",
            "https://images.pexels.com/photos/3270223/pexels-photo-3270223.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
        ]),
    ];
});

$factory->define(productsvariants::class, function (Faker $faker) {
    return [
        'size' => "XS, S, M, L, XL",
        'color' => "red, blue, pink, red, white, black ",
        'quantity' => $faker->numberBetween(1, 100),
    ];
});
