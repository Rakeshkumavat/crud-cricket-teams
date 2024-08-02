@extends('cricket.layout.main')
@section('main-container')

    <body>
        {{-- <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="employee-list">Employees</a>
                </li>
            </ul>
        </div>
    </nav> --}}
    <div class="container mt-3">
        <div class="text-right">
            <div class="text-right">
                <a class="btn btn-dark mt-2" href="{{ route('player-list') }}">Player List</a>
                <a class="btn btn-dark mt-2" href="{{ route('captain-list') }}">Captain List</a>
                <a class="btn btn-dark mt-2" href="{{  route('cricket-palyer-form') }}">New Player Add</a>
                <a class="btn btn-dark mt-2" href="{{  route('team-list') }}">Captain Team List</a>
            </div>
        </div>
    </div>

    <form action="{{ route('captain-insert') }}"method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container mt-5 mb-5 d-flex justify-content-center">
            <div class="card px-1 py-4">
                <div class="card-body">
                    <h1 class="card-title mb-3">Captain Form</h1>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block ">Submit</button>
                </div>
            </div>
        </div>
    </form>
    @endsection
