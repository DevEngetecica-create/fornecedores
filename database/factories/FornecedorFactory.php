<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Providers\BrazilianFakerProvider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fornecedor>
 */
class FornecedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Fornecedor::class;

    public function definition(): array
    {
        return [
            'nome_fantazia' => $this->faker->company,
            'razao_social' => $this->faker->company,
            'cnpj' => BrazilianFakerProvider::cnpj(true), // true para incluir pontuações
            'cpf' => BrazilianFakerProvider::cpf(true),   // true para incluir pontuações
            'nome_contato' => $this->faker->name,
            'email_contato' => $this->faker->unique()->safeEmail,
            'cel_contato' => $this->faker->phoneNumber,
            'endereco' => $this->faker->address,
        ];
    }
}
