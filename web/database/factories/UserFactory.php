<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    
    $NewMember = count(User::all())+1;
    $email='Test'.$NewMember.'@mail.com';
    $password = '123456';
    $Role= $faker->randomElement($array = array ('Admin','User','Viewer'));
    return [
        'name' => $faker->name,
        'email' => $email,
        'role' => $Role,
        'password' => Hash::make($password)
    ];
});
