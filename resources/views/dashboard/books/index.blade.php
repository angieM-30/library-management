@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Books') }}</h1>
                </div><!-- /.col -->
                {{-- div for add button --}}
                <div class="col-md-6">
                    <div class="float-right">
                        <a href="{{ route('books.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add Book</a>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
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
                                        <th style="max-width: 50px;">Quantity</th>
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
                                            <td>{{ $book->quantity }}</td>
                                            <td>
                                                <a href="{{-- route('dashboard.books.edit',$book) --}}" class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{-- route('dashboard.books.destroy',$book) --}}" method="post" class="d-inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger delete-confirm">Delete</button>
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

                        <div class="card-footer clearfix">
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
