<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Book::query();

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%')
                ->orWhere('isbn', 'like', '%' . $search . '%')
                ->orWhere('genre', 'like', '%' . $search . '%');
        }

        $books = $query->paginate(10);

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
            'genre' => ['nullable', 'min:3', 'max:255'],
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

        return redirect()->route('books.index')->with('success', 'Book record created successfully.');
    }

    public function edit(Book $book)
    {
        return view('dashboard.books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255', 'unique:books,title,' . $book->id],
            'author' => ['required', 'min:2', 'max:255'],
            'isbn' => ['required', 'min:3', 'max:255', 'unique:books,isbn,' . $book->id],
            'description' => ['nullable', 'min:3', 'max:255'],
            'genre' => ['nullable', 'min:3', 'max:255'],
            'publisher' => ['nullable', 'min:3', 'max:255'],
            'publication_date' => ['nullable', 'date'],
            'quantity' => ['required', 'integer', 'min:1', 'max:1000'],
        ]);

        $book->update($request->all());

        // set availability to true if quantity is greater than 0
        if ($request->quantity > 0) {
            $book->availability = true;
            $book->save();
        }

        return redirect()->route('books.index')->with('success', 'Book record updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book record deleted successfully.');
    }

}
