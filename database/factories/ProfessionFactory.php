<?php

use Faker\Generator as Faker;

$factory->define(App\Profession::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->paragraph(5),
        'education_level' => $faker->randomElement([
            'sin estudios',
            'secundaria obligatoria',
            'bachillerato',
            'técnico de grado medio',
            'grado superior',
            'grado universitario',
            'postgrado',
        ]),
        'salary' => $faker->numberBetween(20000, 100000),
        'sector' => $faker->randomElement([
            'tecnología',
            'salud',
            'educación',
            'finanzas',
        ]),
        'experience_required' => $faker->numberBetween(0, 10),
    ];
});