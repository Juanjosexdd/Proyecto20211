<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CargoTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(TipodocumentoTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        
    }
}
