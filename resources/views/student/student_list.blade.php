@extends('student.layout.main')
@section('main-container')
<div id="list_student_results">

</div>
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
                <a class="btn btn-dark mt-2" href="/student-form">Add Student</a>
                {{-- <a class="btn btn-dark mt-2" href="user-list">Student List</a> --}}
            </div>
            <form action="" method="">
                <div class="row ">
                    <div class="form-group col-md-3 ">
                        <input type="search" name="search" class="form-control mt-2 search" placeholder="Search by name "
                            value="" />
                    </div>
                    <div class="form-group col-md-2">
                        <button class="btn btn-primary mt-2 search_data" type="submit">Search</button>
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
                        <td>D.O.B</td>
                        <td>Image</td>
                        <td>Signature image</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>

                    @if ($students->isNotEmpty())
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->short_code }}</td>
                                <td>{{ $student->birthdate }}</td>
                                <td>
                                    <img src="employees/{{ $student->image }}" width="50" height="50">
                                </td>
                                <td>
                                    <img src="employees/{{ $student->signature_image }}" width="50" height="50">
                                </td>
                                <td>
                                    <a href="{{ route('edit-student', $student->id) }}" class="btn btn-dark btn-sm">Edit</a>
                                    <a href="{{ route('delete-student-data', $student->id) }}"
                                        class="btn btn-danger btn-sm delete_data">Delete</a>
                                    @if ($student->status == 1)
                                        <a href="{{ route('status', $student->id) }}" id="{{ $student->status }}"
                                            class="status">
                                            <i class="fa fa-check"></i> Inactive
                                        </a>
                                    @else
                                        <a href="{{ route('status', $student->id) }}" id="{{ $student->status }}"
                                            class="status">
                                            <i class="fa fa-close"></i> Active
                                        </a>
                                    @endif
                                </td>

                                {{-- <a href="employee-address/{{ $college->id }}" class="btn btn-dark btn-sm">Address</a> --}}
                            </tr>
                        @endforeach
                    @else
                        <div>
                            <h2>Data not fount</h2>
                        </div>
                    @endif
                </tbody>
            </table>
        </div>
    </body>
@endsection
