<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrower extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'book_id',
        'quantity',
        'borrowed_at',
        'returned_at',
        'is_returned',
        'is_lost',
        'is_damaged',
        'is_replaced',
    ];

    protected $casts = [
        'borrowed_at' => 'date',
        'returned_at' => 'date',
    ];

    public function books()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
