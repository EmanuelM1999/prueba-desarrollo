<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Area;
use App\Empleado;
use Faker\Generator as Faker;

use function PHPSTORM_META\map;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'nombre' => $this->faker->name(),
        'email' =>$this->faker->unique()->safeEmail(),
        'sexo' =>  $this->faker->randomElement(['M', 'F']),
        'area_id' => Area::all()->random()->id,
        'boletin' =>  $this->faker->randomElement([1, 0]),
        'descripcion' => $this->faker->text(200)
    ];
});
