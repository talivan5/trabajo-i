<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Noticia::class, function (Faker $faker) {
    return [
        "titulo"=>$faker->jobTitle,
        "descripcion_corta"=>$faker->text($maxNbChars = 50),
        "descripcion"=>$faker->text($maxNbChars = 190),
        "imagen"=>'default.jpg'
    ];
});
