<?php

namespace Database\Factories\Users;

use App\Models\Users\User;
use Illuminate\Support\Str;
use App\Models\Commons\Demographic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'          => fake()->userName(),
            'password'          => static::$password ??= Hash::make('password'),
            'is_active'         => true,
            'is_provider'       => false,
            'demographic_id'    => Demographic::factory(),
            'remember_token'    => Str::random(10),
        ];
    }
}
