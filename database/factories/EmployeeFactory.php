<?php

use App\Model\Employee;
use App\Model\Company;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;



/** @var Factory $factory */
$factory->define(Employee::class, function (Faker $faker) {
    $last = Company::count();
    return [
        'f_name' => $faker->firstName,
        'l_name' => $faker->lastName,
        'company_id' => rand(1, $last),
        'email' => $faker->unique()->email,
        'phone' => $faker->unique()->phoneNumber
    ];
});
