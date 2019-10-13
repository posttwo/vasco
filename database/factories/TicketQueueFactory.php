<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tickets\TicketQueue;
use Faker\Generator as Faker;

$factory->define(TicketQueue::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
