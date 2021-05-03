<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cargo;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create([
            'nombre' => 'ADMINISTRADOR',
            'slug' => 'administrador',
            'descripcion' => 'ADMINISTRADOR',
            'estatus' => '1'
        ]);

        Cargo::create([
            'nombre' => 'Superovisor almacen',
            'slug' => 'supervisor-almacen',
            'descripcion' => 'Supervisor de almacen',
            'estatus' => '1'
        ]);
        
        Cargo::create([
            'nombre' => 'Superovisor planta',
            'slug' => 'supervisor-planta',
            'descripcion' => 'Supervisor de planta',
            'estatus' => '1'
        ]);
    }
}
