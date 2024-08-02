<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title> Employee List </title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/">Employee list</a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="container mb-3">
        <div class="text-right">
            <a class="btn btn-dark mt-2" href="/">New Employee Add</a>
            <a class="btn btn-dark mt-2" href="employee-list">Employee List</a>
        </div>
        <form action="" method="">
            <div class="row">
                <div class="form-group col-md-3">
                    <input type="text" name="email" class="form-control mt-2" placeholder="Search by Email " value="{{ $email }}"/>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" name="mobile" class="form-control mt-2" placeholder="Search by Mobile " value="{{ $mobile }}" />
                </div>
                <div class="form-group col-md-2">
                    <button class="btn btn-primary mt-2" type="submit">Search</button>
                </div>
            </div>
        </form>

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <table class="table table-striped table-bordered mt-2">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Mobile</td>
                    <td>Hobby</td>
                    <td>Gender</td>
                    <td>Address</td>
                    <td>Email</td>
                    <td>Profile</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @if ($users->isNotEmpty())


                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>{{ $user->hobby }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ @$user->employee->employee_address}}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <img src="employees/{{ $user->image}}" alt="" class="rounded-circle" width="50" height="50"></td>

                        <td>
                            <a href="{{  route('employee-edit',$user->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            <a href="delete-data/{{ $user->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                            {{-- <a href="employee-address/{{ $user->id }}" class="btn btn-dark btn-sm">Address</a> --}}
                        </td>

                    </tr>
                @endforeach
                @else
                <div>
                    <h2>Data not fount</h2>
                </div>
                @endif
            </tbody>
        </table>
        <div class="mt-5">
            {{ $users->links() }}
        </div>
    </div>
</body>

</html>
