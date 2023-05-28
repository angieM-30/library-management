@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <h1 class="m-0">{{ __('Books') }}</h1>
                </div>
                {{-- search field --}}
                <div class="col-md-6">
                    <form action="{{ route('books.index') }}" method="get">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control  float-right"
                                placeholder="Search by Title, Author, or ISBN" value="{{ request()->search }}">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- div for add button --}}
                <div class="col-md-4">
                    <div class="float-right">
                        <a href="{{ route('books.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add
                            Book</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-2 mb-1">
                    @if (session('success'))
                        <div class="alert alert-custom alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-icon">
                                <i class="flaticon2-check-mark icon-md"></i>
                            </div>
                            <div class="alert-text">{{ session('success') }}</div>
                            <div class="alert-close">
                                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-bordered table-responsive-lg table-sm table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="width: 10px;">#</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>ISBN</th>
                                        <th class="text-center" style="max-width: 50px;">Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($books as $book)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->isbn }}</td>
                                            <td class="text-center">{{ $book->quantity }}</td>
                                            <td>
                                                <a href="{{ route('books.edit', $book) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('books.destroy', $book) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No books found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            {{ $books->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
