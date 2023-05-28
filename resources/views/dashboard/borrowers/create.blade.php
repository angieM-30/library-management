@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                {{-- button to redirect back to books.index --}}
                <div class="col-sm-6">
                    <a href="{{ route('borrowers.index') }}" class="btn btn-md btn-secondary"> <i class="fa fa-chevron-left"
                            aria-hidden="true"></i> <span> Go back</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="content">
        <form action="{{ route('borrowers.store') }}" method="POST">
            @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Add Borrower</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name of Borrower</label>
                                            <select name="user_id"
                                                class="form-control  @error('user_id') is-invalid @enderror" required>
                                                <option value="">--Select Borrower--</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"@selected(old('user_id') == $user->id)>
                                                        {{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <select name="book_id"
                                                class="form-control @error('book_id') is-invalid @enderror" required>
                                                <option value="">--Select Book--</option>
                                                @foreach ($books as $book)
                                                    <option value="{{ $book->id }}"@selected(old('book_id') == $book->id)>
                                                        {{ $book->title }} - Available copies ({{ $book->quantity }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('book_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number" name="quantity"
                                                class="form-control @error('quantity') is-invalid @enderror" max="2"
                                                placeholder="Enter quantity" value="{{ old('quantity') }}" required>
                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Date Borrowed</label>
                                            <input type="date" name="borrowed_at"
                                                class="form-control @error('borrowed_at') is-invalid @enderror"
                                                min="{{ date('Y-m-d') }}" placeholder="Enter date borrowed"
                                                value="{{ old('borrowed_at') }}" required>
                                            @error('borrowed_at')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
