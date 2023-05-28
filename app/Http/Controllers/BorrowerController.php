<?php

namespace App\Http\Controllers;

use App\Models\Borrower;

class BorrowerController extends Controller
{
    public function index()
    {
        $borrowers = Borrower::with('user', 'book')->paginate(10);

        return view('dashboard.borrowers.index', compact('borrowers'));
    }
}
