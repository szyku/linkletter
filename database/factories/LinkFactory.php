<?php

use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'description' => $faker->realText(rand(60, 300)),
        'icon' => $faker->miscEmoji(),
        'url' => $faker->url(),
    ];
});
