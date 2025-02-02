<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Modules\User\Models\User;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array{
     *  name: string,
     *  email: string,
     *  email_verified_at: Carbon,
     *  password: string,
     *  photo: string,
     *  provider: string,
     *  provider_id: string,
     *  remember_token: string,
     *  created_at: Carbon,
     *  updated_at: Carbon }
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => Carbon::now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'photo' => $this->faker->word,
            'provider' => $this->faker->word,
            'provider_id' => $this->faker->word,
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

