<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->company,
            'company_identifier' => $this->faker->randomNumber(8),
            'email' => $this->faker->email,
            'vat_in' => $this->faker->randomNumber(9),
            'address_line1' => $this->faker->address,
            'contact_number' => $this->faker->phoneNumber
        ];
    }
}
