<?php

use App\Model\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;


User::create([
    'name' => 'Admin',
    'email' => 'admin@admin.com',
    'role' => User::ROLE_ADMIN,
    'password' => 'password'
]);

/** @var Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => $faker->randomElement([User::ROLE_MEMBER, User::ROLE_MODERATOR, User::ROLE_ADMIN]),
        'logo' => null,
        'password' => 'password'
    ];
});
