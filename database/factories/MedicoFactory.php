<?php

namespace Database\Factories;

use App\Models\Cidade;
use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory 
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'especialidade' => $this->faker->randomElement(['Cardiologista','Ortopedista','Dermatologista','Otorrinolaringologista','Pediatra','Nefrologista']),
            'cidade_id' => Cidade::exists() ? Cidade::get()->pluck('id')->first() : Cidade::factory()->create()->id,
        ];
    }
}