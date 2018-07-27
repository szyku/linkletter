<?php

use App\DispatchJob;
use Faker\Generator as Faker;

$factory->define(DispatchJob::class, function (Faker $faker) {
    return [
        'dispatch_at' => $faker->date('Y-m-d', rand(1, 7) . " days ago"),
        'title' => "Letterlink weekly - issue number " . $faker->issueNumber(),
        'dispatched' => true,
    ];
});
