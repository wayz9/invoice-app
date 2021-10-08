<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => Client::factory(),
            'name' => $this->faker->sentence,
            'invoice_number' => Str::of($this->faker->randomNumber(8))->prepend('#'),
            'issue_date' => now()->addDay()->format('Y-m-d'),
            'due_date' => now()->addMonth()->format('Y-m-d'),
            'status' => Invoice::INVOICE_ACTIVE,
        ];
    }
}
