<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>College</title>
</head>
@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif
<body>
    <div class="row justify-content-center">

        <div class="col-sm-9 ">
            <div class="container mt-3">
                <div class="text-right">
                    {{-- <a class="btn btn-dark mt-2" href="/">New Employee Add</a> --}}
                    <a class="btn btn-dark mt-2" href="/user-list">Back</a>
                </div>
            <div class="card mt-4 p-4">

                <h2>College Partners</h2>
                <form action="{{ route('update-college') }}"method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $college->id }}">
                    <div class="mb-3 mt-3">
                        <label for="name">name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Enter Name" name="name"
                            value="{{ old('name',$college->name) }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="name">Short Code:</label>
                        <input type="text" class="form-control" id="short_code" placeholder="Enter Short Code"
                            name="short_code" value="{{ old('short_code',$college->short_code) }}">
                            <p class="help">This will appear on participation certificate</p>
                        @if ($errors->has('short_code'))
                            <span class="text-danger">{{ $errors->first('short_code') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="">Image</label>
                        <input type="file" name="image" id="image" class="form-control" value="{{ old('image',$college->image) }}" >
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="">Signature Image</label>
                        <input type="file" name="signature_image" id="signature_image" class="form-control" value="{{ old('signature_image',$college->signature_image) }}" >
                        @if ($errors->has('signature_image'))
                            <span class="text-danger">{{ $errors->first('signature_image') }}</span>
                        @endif
                    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</body>

</html>
