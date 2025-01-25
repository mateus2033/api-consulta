<?php

namespace Database\Factories;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Consulta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'medico_id' =>  Medico::exists() ? Medico::get()->pluck('id')->first() : Medico::factory()->create()->id,
            'paciente_id' => Paciente::exists() ? Paciente::get()->pluck('id')->first() : Paciente::factory()->create()->id,
            'data' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s')
        ];
    }
}