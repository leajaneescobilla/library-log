<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowingFactory> */
    use HasFactory;

    protected $fillable = [
        'book_id', 'borrower_name', 'borrower_id_number',
        'borrowed_at', 'due_date', 'returned_at',
    ];

    protected $casts = [
        'borrowed_at' => 'date',
        'due_date'    => 'date',
        'returned_at' => 'date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function getStatusAttribute(): string
    {
        if ($this->returned_at) {
            return 'returned';
        }

        return $this->due_date->lt(today()) ? 'overdue' : 'borrowed';
    }
}
