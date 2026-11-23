<?php

namespace Database\Factories;
use App\Models\Book;

use App\Models\Borrowing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Borrowing>
 */
class BorrowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'book_id' => Book::factory(),
        'borrower_name' => fake()->name(),
        'borrower_id_number' => fake()->numerify('20##-#####'),
        'borrowed_at' => now()->subDays(3),
        'due_date' => now()->addDays(11),
        'returned_at' => null,
        ];
    }

    public function overdue(): static
{
    return $this->state(fn () => [
        'borrowed_at' => now()->subDays(20),
        'due_date' => now()->subDays(6),
    ]);
}

public function returned(): static
{
    return $this->state(fn () => [
        'borrowed_at' => now()->subDays(20),
        'due_date' => now()->subDays(6),
        'returned_at' => now()->subDays(8),
    ]);
}
}
