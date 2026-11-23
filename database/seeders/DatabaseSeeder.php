<?php

namespace Database\Seeders;
use App\Models\Book;
use App\Models\Borrowing;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $books = Book::factory(15)->create(['copies_available' => 5]);

    // 4 returned (copies unaffected)
    foreach (range(0, 3) as $i) {
        Borrowing::factory()->returned()->create(['book_id' => $books[$i]->id]);
    }

    // 3 currently borrowed
    foreach (range(4, 6) as $i) {
        Borrowing::factory()->create(['book_id' => $books[$i]->id]);
        $books[$i]->decrement('copies_available');
    }

    // 3 overdue
    foreach (range(7, 9) as $i) {
        Borrowing::factory()->overdue()->create(['book_id' => $books[$i]->id]);
        $books[$i]->decrement('copies_available');
    }
    
    }
}
