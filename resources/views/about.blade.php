@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('About us') }}</h1>
                </div><!-- /.col -->
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 card">
                                    <div class="card-body bg-dark rounded-sm text-center">
                                        <div class="text-center">
                                            <img src="{{ asset('images/Angie.png') }}" class="rounded-circle"
                                                alt="Developer 1">
                                        </div>
                                        <h5 class="text-center mt-3">Angelica P. Madrona</h5>
                                        <p class="text-center">madronaangelica30@gmail.com</p>
                                        <a href="https://github.com/angieM-30"> https://github.com/angieM-30</a>
                                    </div>
                                </div>
                                <div class="col-md-4 card">
                                    <div class="card-body bg-dark rounded-sm text-center">
                                        <div class="text-center">
                                            <img src="{{ asset('images/allyssa.jpg') }}" class="rounded-circle"
                                                alt="Developer 1">
                                        </div>
                                        <h5 class="text-center mt-3">Alyssa G. Balaoro</h5>
                                        <p class="text-center">balaoroalyssa@gmail.com</p>
                                        <a href="https://github.com/Alyssa0404">https://github.com/Alyssa0404</a>
                                    </div>
                                </div>
                                <div class="col-md-4 card">
                                    <div class="card-body bg-dark rounded-sm text-center">
                                        <div class="text-center">
                                            <img src="{{ asset('images/siriya.jpg') }}" class="rounded-circle"
                                                alt="Developer 1">
                                        </div>
                                        <h5 class="text-center mt-3">Rea Mae Jocel G. Cledera</h5>
                                        <p class="text-center">rmjcledera07@gmail.com</p>
                                        <a href="https://github.com/reamaejocel">https://github.com/reamaejocel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
