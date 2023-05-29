@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0">{{ __('Dashboard') }}</h1>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body card-bcc">
                            <p class="card-text">
                                {{-- {{ __('You are logged in!') }} --}}
                            </p>

                            @if (auth()->user()->role == 'admin')
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>{{ $totalBooks }}</h3>
                                                <p>Total Books</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-book" aria-hidden="true"></i>
                                            </div>
                                            <a href="{{ route('books.index') }}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>{{ $totalUsers }}</h3>
                                                <p>Total Users</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                                            </div>
                                            <a href="{{ route('users.index') }}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>{{ $totalBorrowers }}</h3>
                                                <p>Total Borrowers</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-users" aria-hidden="true"></i>
                                            </div>
                                            <a href="{{ route('borrowers.index') }}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                                <h3>{{ $totalPending }}</h3>
                                                <p>Pending Approval for Borrowers</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-chart-pie" aria-hidden="true"></i>
                                            </div>
                                            <a href="{{ route('borrowers.index') }}" class="small-box-footer">More info <i
                                                    class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                            @endif

                            @if (auth()->user()->role == 'user')
                                <h1 class="text-center">Welcome to SORSU-BC Library Management System</h1>
                                <p class="text-center">
                                    This is a library management system for Sorsogon State University - Bulan Campus. This
                                    system is designed to help the librarian to manage the books and the borrowers of the
                                    library, keeping track of the records of the books and respective borrowers.
                                </p>
                            @endif
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        @endsection
