<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrower;
use App\Models\User;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // count the number of books depending on the quantity column
        $books = Book::all();
        $totalBooks = $books->sum('quantity');

        $totalUsers = User::all()->count();
        $totalBorrowers = Borrower::where('status', 'approved')->count();
        $totalPending = Borrower::where('status', 'pending')->count();

        return view('home', compact('totalBooks', 'totalUsers', 'totalBorrowers', 'totalPending'));
    }
}
