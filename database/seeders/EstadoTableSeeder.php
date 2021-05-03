<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'nombre' => 'Portuguesa',
            'slug' => 'portuguesa',
            'estatus' => '1'
        ]);
        Estado::create([
            'nombre' => 'Lara',
            'slug' => 'lara',
            'estatus' => '1'
        ]);
        Estado::create([
            'nombre' => 'Carabobo',
            'slug' => 'carabobo',
            'estatus' => '1'
        ]);
        Estado::create([
            'nombre' => 'Falcon',
            'slug' => 'falcon',
            'estatus' => '1'
        ]);
        Estado::create([
            'nombre' => 'Barina',
            'slug' => 'barina',
            'estatus' => '1'
        ]);
        Estado::create([
            'nombre' => 'Merida',
            'slug' => 'merida',
            'estatus' => '1'
        ]);
    }
}
