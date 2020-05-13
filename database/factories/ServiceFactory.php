<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        //
        // 'customerId'=> factory(\App\Customer::class),
        'modelName'=> $faker->name,
        'flowTagNumber'=> $faker->name,
        'serialNumber'=> $faker->name,
        'type'=> $faker->name,
        'quantity'=> $faker->name,
        'status'=> $faker->name,
        'dateIn'=> $faker->dateTimeBetween('now', '+01 days'),
        'dateOut'=> $faker->dateTimeBetween('now', '+01 days'),
        'remark'=> $faker->name
    ];
});
