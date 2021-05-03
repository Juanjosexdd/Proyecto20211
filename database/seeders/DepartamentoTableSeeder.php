<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            'nombre' => 'INFORMATICA',
            'slug' => 'informatica',
            'descripcion' => 'INFORMATICA',
            'estatus' => '1'
        ]);

        Departamento::create([
            'nombre' => 'Almacen',
            'slug' => 'almacen',
            'descripcion' => 'Almacen',
            'estatus' => '1'
        ]);
    }
}
