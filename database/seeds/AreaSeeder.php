<?php

use App\Area;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'nombre' => 'Administracion'
        ]);

        Area::create([
            'nombre' => 'Ventas'
        ]);

        Area::create([
            'nombre' => 'Calidad'
        ]);
    }
}
