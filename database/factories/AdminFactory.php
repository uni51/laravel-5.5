<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;
    static $seed = 0;

    $faker->seed($seed++);

    return [
        'username' => str_random(6),
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});
