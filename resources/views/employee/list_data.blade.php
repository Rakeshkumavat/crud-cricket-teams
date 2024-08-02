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
                        <img src="employees/{{ $college->image }}" width="50" height="50">
                    </td>
                    <td>
                        <img src="employees/{{ $college->signature_image }}" width="50" height="50">
                    </td>
                    <td>
                        <a href="{{  route('employee-edit',$college->id) }}" class="btn btn-dark btn-sm">Edit</a>
                        <a href="{{  route('delete-data',$college->id) }}" class="btn btn-danger btn-sm delete_data">Delete</a>
                        @if($college->status== 1)
                            <a href="{{ route('status',$college->id)}}"  id="{{$college->status}}" class="status">
                                <i class="fa fa-check"></i> Inactive
                            </a>
                        @else
                            <a href="{{ route('status',$college->id) }}" id="{{$college->status}}" class="status">
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
