<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
        'author' => fake()->name(),
        'isbn' => fake()->unique()->isbn13(),
        'category' => fake()->randomElement(['Fiction', 'Science', 'IT', 'History', 'Math']),
        'copies_available' => fake()->numberBetween(1, 5),
        ];
    }
}
