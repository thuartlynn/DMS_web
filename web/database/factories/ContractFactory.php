<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\ContractEntite as Contract;
use Faker\Generator as Faker;
use App\User;

$factory->define(Contract::class, function (Faker $faker) {
    
    $NewContract = count(Contract::all())+1;
    $id = "Con-".sprintf("%04d", $NewContract);
    $name = $faker->company().'_Contract';
    $start = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);
    $end = $faker->dateTimeInInterval($startDate = $start, $endDate = ' + 3 years', $timezone = null);
    $status = $faker->randomElement($array = array ('有效','無效','送簽中','洽談中'));
    $owner = 2;
    return [
        'contract_id' => $id,
        'name' => $name,
        'part_name' => $faker->company(),
        'status' => $status,
        'owner' => $owner
    ];
});
