<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Student;
use App\User as User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    static $password;

    $instructors = Users
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    ];
});