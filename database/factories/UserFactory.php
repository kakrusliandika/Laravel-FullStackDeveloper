<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password = 'password'; // Default password if needed

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => $this->faker->unique()->userName(),
            'password' => bcrypt(self::$password),
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'whatsapp' => $this->faker->phoneNumber(),
            'image' => $this->faker->imageUrl(200, 200, 'people'),
            'blokir' => 'N',
            'level' => 'pengguna',
            'metode_login' => $this->faker->randomElement(['email', 'google', 'facebook']),
            'ip' => $this->faker->ipv4(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(11),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
