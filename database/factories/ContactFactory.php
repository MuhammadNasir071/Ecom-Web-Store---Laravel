<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'contact_user_id' => '64258380-a863-412b-ac37-89814d41c82a',
            'name' => $this->faker->name(),
            'contact_number' => $this->faker->phoneNumber(),
        ];
    }
}
