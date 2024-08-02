<!DOCTYPE html>
<html lang="en">

<head>
    <title>Employees</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">

                    <h2>Employee form</h2>
                    <form action="{{ route('update-employee') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('POST') --}}
                        <div class="mb-3 mt-3">
                            <input type="hidden" name="id" class="form-control" placeholder=""
                                value="{{ $users->id }}">

                            <label for="name">First Name:</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                id="first_name" placeholder="Enter Name" name="first_name"
                                value="{{ old('first_name',$users->first_name)  }}">
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="name">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Enter Name"
                                name="last_name" value="{{ old('last_name',$users->last_name ) }}">
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email"
                                name="email" value="{{ old('email',$users->email)  }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="mobile">Mobile:</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Enter Mobile Number"
                                name="mobile" value="{{ old('mobile',$users->mobile)  }}">
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
                            @php
                                $address ="";
                                if (isset($users->employee->employee_address)) {
                                    $address = $users->employee->employee_address;
                                }
                            @endphp
                            <label for="address">Address:</label>
                            <textarea name="employee_address" id="employee_address" rows="4" class="form-control" placeholder="Enter Address">{{old('employee_address',$address) }}</textarea>
                            @if ($errors->has('employee_address',$address))
                                <span class="text-danger">{{ $errors->first('employee_address') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="">Hobbies :- </label>
                            <input type="checkbox" name="hobby[]" value="sports" id="sport"
                                {{ in_array('sports', explode(',', $users->hobby)) ? 'checked' : '' }}>
                            <label for="sport">Sports</label>
                            <input type="checkbox" name="hobby[]" value="music" id="music"
                                {{ in_array('music', explode(',', $users->hobby)) ? 'checked' : '' }}>
                            <label for="music">Music</label>
                            <input type="checkbox" name="hobby[]" value="reading" id="read"
                                {{ in_array('reading', explode(',', $users->hobby)) ? 'checked' : '' }}>
                            <label for="read">Reading</label>
                            @if ($errors->has('hobby'))
                                <span class="text-danger">{{ $errors->first('hobby') }}</span>
                            @endif
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="">Gender :- &nbsp;</label>
                            <input type="radio" name="gender" value="male" id="male"
                                {{ $users->gender == 'Male' ? 'checked' : '' }}>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="female" id="female"
                                {{ $users->gender === 'female' ? 'checked' : '' }}>
                            <label for="female">Female</label>
                            <input type="radio" name="gender" value="other" id="other"
                                {{ $users->gender === 'Other' ? 'checked' : '' }}>
                            <label for="other">Other</label>
                            @if ($errors->has('gender'))
                                <span class="text-danger">{{ $errors->first('gender') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 mt-3">
                            <label for=""></label>
                            <input type="file" name="image" id="" class="form-control"  >
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
