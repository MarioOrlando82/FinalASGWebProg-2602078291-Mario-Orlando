<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'linkedin_username' => 'https://www.linkedin.com/in/' . $this->faker->userName,
            'mobile_number' => $this->faker->numerify('##########'),
            'registration_price' => rand(100000, 125000),
            'coins' => 100,
            'visible' => true,
            'profile_photo' => 'https://picsum.photos/100/100?random=' . mt_rand(1, 1000),
        ];
    }
}
