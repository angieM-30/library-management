@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                {{-- button to redirect back to books.index --}}
                <div class="col-sm-6">
                    <a href="{{ route('books.index') }}" class="btn btn-md btn-secondary"> <i class="fa fa-chevron-left"
                            aria-hidden="true"></i> <span> Go back</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="content">
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Book</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                value="{{ $book->title }}" name="title" placeholder="Enter title of book"
                                                required>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Author</label>
                                            <input type="text" class="form-control @error('author') is-invalid @enderror"
                                                value="{{ $book->author }}" name="author" placeholder="Author" required>
                                            @error('author')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>ISBN</label>
                                            <input type="text" class="form-control @error('isbn') is-invalid @enderror"
                                                value="{{ $book->isbn }}" name="isbn" placeholder="ISBN" required>
                                            @error('isbn')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Description <span
                                                    class="text-muted font-italic">(Optional)</span></label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description"
                                                rows="3">{{ $book->description }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Genre <span class="text-muted font-italic">(Optional)</span></label>
                                            <input type="text" class="form-control @error('genre') is-invalid @enderror"
                                                value="{{ $book->genre }}" name="genre" placeholder="Genre">
                                            @error('genre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Publisher <span class="text-muted font-italic">(Optional)</span></label>
                                            <input type="text"
                                                class="form-control @error('publisher') is-invalid @enderror"
                                                value="{{ $book->publisher }}" name="publisher" placeholder="Publisher">
                                            @error('publisher')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Publication Date <span
                                                    class="text-muted font-italic">(Optional)</span></label>
                                            <input type="date"
                                                class="form-control @error('publication_date') is-invalid @enderror"
                                                value="{{ $book->publication_date?->format('Y-m-d') ?? '' }}"
                                                name="publication_date" placeholder="Publication Date">
                                            @error('publication_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input type="number"
                                                class="form-control @error('quantity') is-invalid @enderror"
                                                value="{{ $book->quantity }}" name="quantity" placeholder="Quantity"
                                                required>
                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
