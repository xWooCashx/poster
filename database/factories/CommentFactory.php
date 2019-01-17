<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::inRandomOrder()->first()->id,
        'post_id' => \App\Post::inRandomOrder()->first()->id,
        'content' => $faker->sentence(3),
        'created_at' => $faker->dateTimeThisYear,
        'updated_at' => $faker->dateTimeThisYear
    ];
});
