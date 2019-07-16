<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    static $password;
    static $seed = 0;

    $faker->seed($seed++);

    return [
        'username' => str_random(6),
        // $passwordが存在する場合は、$passwordをセット。存在しない場合はsecretをセット
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});
