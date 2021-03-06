<?php

use Faker\Generator as Faker;

$factory->define(App\BoardMember::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'name' => $faker->name,
        'description' => $faker->text,
        'email' => $faker->safeEmail,
        'order' => $faker->randomDigit,
    ];
});
