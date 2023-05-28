<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'description',
        'publication_date',
        'publisher',
        'genre',
        'availability',
        'quantity',
    ];

    protected $casts = [
        'publication_date' => 'date',
    ];

    public function borrowers()
    {
        return $this->hasMany(Borrower::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'borrowers');
    }
}
