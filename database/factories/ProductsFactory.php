<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Products;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Products::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(),
        'by_prescription' => $faker->text(10),
        'type' => $faker->randomKey([
            Products::TYPE_PIZZA,
            Products::TYPE_COMBO,
            Products::TYPE_DESSERTS,
            Products::TYPE_PROMOTIONS,
        ]),
        'cost_eur' => $faker->randomFloat(),
        'cost_usd' => $faker->randomFloat(),
        'from' => $faker->dateTime,
        'to' => $faker->dateTime->add(new DateInterval('PT10H30S')),
    ];
});
