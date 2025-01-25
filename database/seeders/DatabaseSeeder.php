<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cidade::factory(5)->create();
        Paciente::factory(5)->create();
        Medico::factory(3)->create();
        Consulta::factory(2)->create();
    }
}
