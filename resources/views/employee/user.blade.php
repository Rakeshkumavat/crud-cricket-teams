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
                    <a class="btn btn-dark mt-2" href="user-list">College List</a>
                </div>
            <div class="card mt-4 p-4">

                <h2>College Partners</h2>
                <form action="{{ route('insert-user') }}"method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="id" value="{{ $college->id }}"> --}}
                    <div class="mb-3 mt-3">
                        <label for="name">name:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Enter Name" name="name"
                            value="{{ old('name',$college->name ?? '') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="name">Short Code:</label>
                        <input type="text" class="form-control" id="short_code" placeholder="Enter Short Code"
                            name="short_code" value="{{ old('short_code',$college->short_code ?? '') }}">
                            <p class="help">This will appear on participation certificate</p>
                        @if ($errors->has('short_code'))
                            <span class="text-danger">{{ $errors->first('short_code') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="">Image</label>
                        <input type="file" name="image" id="image" class="form-control" value="{{ old('image',$college->image ?? '') }}" >
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="">Signature Image</label>
                        <input type="file" name="signature_image" id="signature_image" class="form-control" value="{{ old('signature_image',$college->signature_image ?? '') }}" >
                        @if ($errors->has('signature_image'))
                            <span class="text-danger">{{ $errors->first('signature_image') }}</span>
                        @endif
                    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</body>

</html>


@extends('layout')

@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ $details['image'] }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">${{ $details['price'] }}</td>
                    <td data-th="Quantity">
                        <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                    </td>
                    <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong>Total ${{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-success">Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')
<script type="text/javascript">

    $(".update-cart").change(function (e) {
        e.preventDefault();

        var ele = $(this);

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
@endsection


$("body").on("click", ".quantity", function(e) {
    e.preventDefault();
        t = $(this);

        $.ajax({
            url: "{{route('add.to.quantity')}}",
            type: 'get',

            beforeSend: function() {
                t.prop('disabled', true);
            },
            complete: function() {
                t.prop('disabled', false);
            },
            success: function(response) {
                console.log(response)

            }
        });

});
