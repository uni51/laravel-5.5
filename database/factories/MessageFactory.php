<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    static $seed = 0;

    $faker->seed($seed++);

    return [
        'user_id' => $faker->numberBetween(1, 10),
        'title' => $faker->realText(10),
        'content' => $faker->realText(250),
    ];
});
