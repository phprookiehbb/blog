<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Admin::class, function (Faker $faker) {
    return [
        'email' => '646054215@qq.com',
        'password' => bcrypt('646054215')
    ];
});
