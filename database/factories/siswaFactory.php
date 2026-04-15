<?php

namespace Database\Factories;

use App\Models\siswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends Factory<siswa>
 */
class siswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'absen' => fake()->numberBetween(1, 36),
            'kelas' => fake()->randomElement(['XI RPL 1', 'XI RPL 2', 'XI RPL 3'])
        ];
    }
}
