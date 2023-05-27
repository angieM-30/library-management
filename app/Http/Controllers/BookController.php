<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);

        return view('dashboard.books.index', compact('books'));
    }

    public function create()
    {
        return view('dashboard.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255', 'unique:books,title'],
            'author' => ['required', 'min:2', 'max:255'],
            'isbn' => ['required', 'min:3', 'max:255', 'unique:books,isbn'],
            'description' => ['nullable', 'min:3', 'max:255'],
            'publisher' => ['nullable', 'min:3', 'max:255'],
            'publication_date' => ['nullable', 'date'],
            'quantity' => ['required', 'integer', 'min:1', 'max:1000'],
        ]);

        Book::create($request->all());

        // set availability to true if quantity is greater than 0
        if ($request->quantity > 0) {
            $book = Book::where('isbn', $request->isbn)->first();
            $book->availability = true;
            $book->save();
        }

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

}
