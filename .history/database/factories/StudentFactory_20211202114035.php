<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Student;
use App\Student as User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    static $password;

    return [
        'user_id' => function () {
            return App\User::class->all();
        },
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    ];
});