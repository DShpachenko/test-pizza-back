<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Orders;
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

$factory->define(Orders::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\Models\User::class)->create()->id;
        },
        'address' => $faker->address,
        'total_sum_eur' => $faker->randomDigit,
        'total_sum_usd' => $faker->randomDigit,
    ];
});
