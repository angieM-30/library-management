<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = Borrower::with('user', 'books')->paginate(10);

        return view('dashboard.borrowers.index', compact('borrowers'));
    }

    public function create()
    {
        $users = User::where('role', '!=', 'admin')->get();
        $books = Book::all();
        $borrowers = Borrower::all();

        foreach ($books as $book) {
            $book->quantity = $book->quantity - $borrowers->where('book_id', $book->id)->sum('quantity');
        }

        // return only books with available copies
        $books = $books->filter(function ($book) {
            return $book->quantity > 0;
        });

        return view('dashboard.borrowers.create', compact('users', 'books', 'borrowers'));
    }

    public function approve(Borrower $borrower)
    {
        $borrower->status = 'approved';
        $borrower->borrowed_at = now();
        $borrower->save();

        return redirect()->route('borrowers.index')->with('success', 'Borrower request approved successfully.');
    }

    public function edit(Borrower $borrower)
    {
        $users = User::where('role', '!=', 'admin')->get();
        $books = Book::all();
        $borrowers = Borrower::all();

        foreach ($books as $book) {
            $book->quantity = $book->quantity - $borrowers->where('book_id', $book->id)->sum('quantity');
        }

        // return only books with available copies
        $books = $books->filter(function ($book) {
            return $book->quantity > 0;
        });

        return view('dashboard.borrowers.edit', compact('borrower', 'users', 'books', 'borrowers'));
    }

    public function update(Request $request, Borrower $borrower)
    {
        $data = request()->validate([
            'user_id' => ['required', 'exists:users,id'],
            'book_id' => ['required', 'exists:books,id'],
            'quantity' => ['required', 'integer', 'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    $book = Book::findOrFail($request->book_id);
                    $availableCopies = $book->quantity;

                    $borrowedCopies = Borrower::where('book_id', $request->book_id)->sum('quantity');
                    $availableCopies -= $borrowedCopies;

                    if ($value > $availableCopies) {
                        $fail('The quantity exceeds the available copies for this book.');
                    }
                },
            ],
            'borrowed_at' => ['required'],
            'returned_at' => ['nullable'],
            'is_returned' => ['nullable'],
            'is_lost' => ['nullable'],
            'is_damaged' => ['nullable'],
            'is_replaced' => ['nullable'],
        ]);

        $borrower->update($data);

        return redirect()->route('borrowers.index')->with('success', 'Borrower record updated successfully.');
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'user_id' => ['required', 'exists:users,id'],
            'book_id' => ['required', 'exists:books,id'],
            'quantity' => ['required', 'integer', 'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    $book = Book::findOrFail($request->book_id);
                    $availableCopies = $book->quantity;

                    $borrowedCopies = Borrower::where('book_id', $request->book_id)->sum('quantity');
                    $availableCopies -= $borrowedCopies;

                    if ($value > $availableCopies) {
                        $fail('The quantity exceeds the available copies for this book.');
                    }
                },
            ],
            'borrowed_at' => ['required'],
            'returned_at' => ['nullable'],
            'is_returned' => ['nullable'],
            'is_lost' => ['nullable'],
            'is_damaged' => ['nullable'],
            'is_replaced' => ['nullable'],
        ]);

        Borrower::create($data);

        return redirect()->route('borrowers.index')->with('success', 'Borrower record created successfully.');
    }

    public function destroy(Borrower $borrower)
    {
        $borrower->delete();

        return redirect()->route('borrowers.index')->with('success', 'Borrower record deleted successfully.');
    }

    public function requestBorrow(Book $book)
    {
        $user = auth()->user();

        // check if there is pending request for this book with the same user_id
        $pendingRequest = Borrower::where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->where('status', 'pending')
            ->first();

        if ($pendingRequest) {
            return redirect()->route('books.index')->with('error', 'You already have a pending request for this book.');
        }

        $data = [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'quantity' => 1,
            'status' => 'pending',
            'borrowed_at' => now(),
        ];

        Borrower::create($data);

        return redirect()->route('books.index')->with('success', 'Borrower request sent successfully.');
    }

    public function returnBook(Borrower $borrower)
    {
        $borrower->returned_at = now();
        $borrower->is_returned = true;
        $borrower->status = 'returned';
        $borrower->save();

        return redirect()->route('borrowers.index')->with('success', 'Book returned successfully.');
    }

}
