<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

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
}
