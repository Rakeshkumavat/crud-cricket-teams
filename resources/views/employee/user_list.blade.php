<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title> College List </title>
</head>

<body>
    {{-- <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/">Employee list</a>
                </li>
            </ul>
        </div>

    </nav> --}}
    <div class="container mb-3">
        <div class="text-right">
            <a class="btn btn-dark mt-2" href="/create">college Add</a>
            <a class="btn btn-dark mt-2" href="user-list">College List</a>
        </div>
        <form action="" method="">
            <div class="row">
                <div class="form-group col-md-3">
                    <input type="search" name="search" class="form-control mt-2" placeholder="Search by name " value="{{ $search }}"/>
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
                    <td>Short Code</td>
                    <td>Image</td>
                    <td>Signature image</td>
                </tr>
            </thead>
            <tbody>

            @if ($colleges->isNotEmpty())



                @foreach ($colleges as $college)
                    <tr>
                        <td>{{ $loop->iteration }}
                        <td>{{ $college->name }}</td>
                        <td>{{ $college->short_code }}</td>
                        <td>
                            <img src="employees/{{ $college->image}}"   width="50" height="50">
                        </td>
                        <td>
                            <img src="employees/{{ $college->signature_image}}"  width="50" height="50">
                        </td>
                        <td>
                            <a href="edit-list/{{ $college->id }}" class="btn btn-dark btn-sm">Edit</a>
                            <a href="delete-collage/{{ $college->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                            {{-- <a href="" class="btn btn-sm btn-{{ $college->status ? 'success' : 'danger'}}"> {{ $college->status ? 'inactive' : 'active'}}</a> --}}
                            <a href=""></a>
                        </td>
                            {{-- <a href="employee-address/{{ $user->id }}" class="btn btn-dark btn-sm">Address</a> --}}
                    </tr>
                @endforeach
                @else
                <div>
                    <h2>Data not fount</h2>
                </div>
                @endif
            </tbody>
        </table>
        {{-- <div class="mt-5">
            {{ $users->links() }}
        </div> --}}
    </div>
</body>

</html>
