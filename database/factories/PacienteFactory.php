<?php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paciente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => rand(100,999) . '.' .rand(100,999)  . '.' . rand(100,999) . '-' . rand(10,99),
            'nome' => $this->faker->name(),
            'celular' => $this->faker->phoneNumber()
        ];
    }
}