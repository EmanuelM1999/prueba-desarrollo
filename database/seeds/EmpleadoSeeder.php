<?php

use App\Empleado;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Empleado::class, 15)->create()->each(function (Empleado $empleado){
            $empleado->roles()->sync(rand(1,3),rand(1,3));
        });
    }
}
