<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        //
        'modelName'=> $faker->name,
        'type'=> $faker->sentence,
        'quantity'=> $faker->sentence,
        'status'=> $faker->sentence,
        'remark'=> $faker->sentence
    ];
});
