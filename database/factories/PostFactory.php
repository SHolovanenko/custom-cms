<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence();
    $alis = Str::of($title)->slug();
    $isPublished = (rand(1, 10) > 1) ? true : false;

    return [
        'category_id' => rand(1, 10),
        'creator_id' => rand(1, 2),
        'title' => $title,
        'alias' => $alis,
        'content' => $faker->text(),
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-3 months', 'now') : null
    ];
});
