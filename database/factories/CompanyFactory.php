<?php

use App\Model\Company;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'logo' => $faker->randomElement(['/company-logo/random.png', null]),
        'website' => $faker->url
    ];
});
