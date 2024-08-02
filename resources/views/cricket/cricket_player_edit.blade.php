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



        <div class="row justify-content-center">

            <div class="col-sm-9 ">
                <div class="container mt-3">
                    <div class="text-right">
                        <a class="btn btn-dark mt-2" href="{{ route('player-list') }}">Cricket Player List</a>
                    </div>
                <div class="card mt-4 p-4">

                    <h2>Cricket Player form</h2>
                    <form action="{{ route('update-player') }}"method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 mt-3">
                            <input type="hidden" name="id" class="form-control" placeholder=""
                                value="{{ $players->id }}">
                            <label for="name">First Name:</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="first_name" placeholder="Enter Name" name="first_name"
                                value="{{ old('first_name',$players->first_name) }}">
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name"
                                name="last_name" value="{{ old('last_name',$players->last_name) }}">
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="mobile">Mobile:</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number"
                                name="mobile" value="{{ old('mobile',$players->mobile) }}">
                            @if ($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="age">Age:</label>
                            <input type="text" class="form-control" id="age" placeholder="Enter Age"
                                name="age" value="{{ old('age',$players->age) }}">
                                @if ($errors->has('age'))
                                <span class="text-danger">{{ $errors->first('age') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="building">Building:</label>
                            <input type="text" class="form-control" id="building" placeholder="Enter building"
                                name="building" value="{{ old('building',$players->building) }}">
                                @if ($errors->has('building'))
                                <span class="text-danger">{{ $errors->first('building') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="mobile">Flat Number:</label>
                            <input type="text" class="form-control" id="flat_number" placeholder="Enter minimum 3 numbers or maximum 4 numbers"
                                name="flat_number" value="{{ old('flat_number',$players->flat_number) }}">
                            @if ($errors->has('flat_number'))
                                <span class="text-danger">{{ $errors->first('flat_number') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="">Gender :- &nbsp;</label>
                            <input type="radio" name="gender" value="male" id="male" {{ $players->gender == 'Male' ? 'checked' : '' }}>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" id="female" {{ $players->gender == 'female' ? 'checked' : '' }}>
                            <label for="female">Female</label>
                            <input type="radio" name="gender" value="other" id="other" {{ $players->gender == 'Other' ? 'checked' : '' }}>
                            <label for="other">Other</label>
                            @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

            </div>
        </div>
    </div>

</body>

</html>
@endsection
