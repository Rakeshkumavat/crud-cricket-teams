<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Employees</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="employee-list">Employees</a>
                </li>
            </ul>
        </div>
    </nav>



        <div class="row justify-content-center">

            <div class="col-sm-9 ">
                <div class="container mt-3">
                    <div class="text-right">
                        {{-- <a class="btn btn-dark mt-2" href="/">New Employee Add</a> --}}
                        <a class="btn btn-dark mt-2" href="employee-list">Employee List</a>
                    </div>
                <div class="card mt-4 p-4">

                    <h2>Employee form</h2>
                    <form action="{{ '/employee-insert' }}"method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 mt-3">
                            <label for="name">First Name:</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="first_name" placeholder="Enter Name" name="first_name"
                                value="{{ old('first_name') }}">
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Enter Name"
                                name="last_name" value="{{ old('last_name') }}">
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="mobile">Mobile:</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number"
                                name="mobile" value="{{ old('mobile') }}">
                            @if ($errors->has('mobile'))
                                <span class="text-danger">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>
                        {{-- <div class="mb-3 mt-3">
                            <label for="country">Country:</label>
                            <input type="text" class="form-control" id="country_id" placeholder="Enter Country"
                                name="country_id">
                        </div> --}}
                        <div class="mb-3 mt-3">
                            <label for="employee_address">Address:</label>
                            <textarea name="employee_address" id="employee_address" rows="4" class="form-control" placeholder="Enter Address">{{ old('employee_address') }}</textarea>
                            @if ($errors->has('employee_address'))
                                <span class="text-danger">{{ $errors->first('employee_address') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="">Hobbies :- </label>
                            <input type="checkbox" name="hobby[]" value="sports" id="sports" @if(old('hobby')) checked @endif>
                            <label for="sport">Sports</label>
                            <input type="checkbox" name="hobby[]" value="music" id="music" @if(old('hobby')) checked @endif>
                            <label for="music">Music</label>
                            <input type="checkbox" name="hobby[]" value="reading" id="read" @if(old('hobby')) checked @endif>
                            <label for="read">Reading</label>
                            @if ($errors->has('hobby'))
                                <span class="text-danger">{{ $errors->first('hobby') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="">Gender :- &nbsp;</label>
                            <input type="radio" name="gender" value="male" id="male" @if(old('gender')=="male") checked @endif>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" id="female" @if(old('gender')=="female") checked @endif>
                            <label for="female">Female</label>
                            <input type="radio" name="gender" value="other" id="other" @if(old('gender')=="other") checked @endif>
                            <label for="other">Other</label>
                            @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 mt-3">
                            <label for=""></label>
                            <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}" >
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
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


