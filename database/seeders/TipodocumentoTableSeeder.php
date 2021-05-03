<?php

namespace Database\Seeders;

use App\Models\Tipodocumento;
use Illuminate\Database\Seeder;

class TipodocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipodocumento::create([
            'nombre' => 'Venezolano',
            'slug' => 'venezolano',
            'abreviado' => 'V',
            'estatus' => '1'
        ]);
        Tipodocumento::create([
            'nombre' => 'Extranjero',
            'slug' => 'extranjero',
            'abreviado' => 'E',
            'estatus' => '1'
        ]);
    }
}
