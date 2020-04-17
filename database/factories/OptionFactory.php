<?php

use App\Model\Option;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Option::class, function (Faker $faker) {
    $values = [$faker->slug , ['a' => 1, 'b' => 2, 'c' => 3]];
    return [
        'id' => $faker->unique()->word,
        'value' => $values[rand(0, 1)],
        'init' => rand(0, 1)
    ];
});
