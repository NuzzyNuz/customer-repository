<?php

$factory->define(\Iyngaran\Customer\Models\Customer::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->title('Male'),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName
    ];
});