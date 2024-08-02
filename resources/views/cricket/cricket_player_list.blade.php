@extends('cricket.layout.main')
@section('main-container')
<div class="container mb-3">
    <div class="text-right">
        <a class="btn btn-dark mt-2" href="{{ route('captain-list') }}">Captain List</a>
        <a class="btn btn-dark mt-2" href="{{  route('captain-form') }}">New Captain Add</a>
        <a class="btn btn-dark mt-2" href="{{  route('cricket-palyer-form') }}">New Player Add</a>
        <a class="btn btn-dark mt-2" href="{{  route('team') }}">Captain Team List</a>

    </div>
    <form action="" method="get">
        <div class="row">
            <div class="form-group col-md-3">
                <input type="text" name="search" class="form-control mt-2" id="search" placeholder="Search by name and Mobile Number " value="{{ isset($inputs['search']) ? $inputs['search'] : '' }}"/>
            </div>
            <div class="form-group col-md-2">
                <select name="building" class="form-control mt-2">
                    <option value="">Select Building</option>
                    <option value="a" {{ isset($inputs['building']) && $inputs['building'] == 'a' ? 'selected' : '' }}>A</option>
                    <option value="b" {{ isset($inputs['building']) && $inputs['building'] == 'b' ? 'selected' : '' }}>B</option>
                    <option value="c" {{ isset($inputs['building']) && $inputs['building'] == 'c' ? 'selected' : '' }}>C</option>

                </select>
            </div>
            <div class="form-group col-md-4">
                <select name="gender" class="form-control mt-2">
                    <option value="">Select Gender </option>
                    <option value="male" {{ isset($inputs['gender']) && $inputs['gender'] == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ isset($inputs['gender']) && $inputs['gender'] == 'female' ? 'selected' : '' }}>Female</option>

                </select>
            </div>
            <div class="form-group col-md-2">
                <input type="date" class="form-control mt-2" id="date" name="date" value="{{ isset($inputs['date']) ? $inputs['date'] : '' }}">
            </div>
            <div class="form-group col-md-1">
                <button class="btn btn-primary mt-2" type="submit">Search</button>
            </div>
        </div>

    </form>
    <div class="text-right"><a class="btn btn-success mt-2" href="{{ route('file-export',['gender'=>isset($inputs['gender']) && $inputs['gender'] == 'male','female' ? 'selected' : '']) }}">Export data</a></div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif
    @auth
        {{ auth() }}
    @endauth
    <table class="table table-striped table-bordered mt-2">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Age</td>
                <td>Bulding/flat.No</td>
                <td>Mobile.No</td>
                <td>Gender</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @if ($players->isNotEmpty())


                @foreach ($players as $player)
                    <tr>
                        <td>{{ $loop->iteration }}
                        <td>{{ $player->first_name }} {{ $player    ->last_name }}</td>
                        <td>{{ $player->age }}</td>
                        <td>{{ $player->building }}-{{ $player->flat_number }}</td>
                        <td>{{ $player->mobile }}</td>
                        <td>{{ $player->gender }}</td>
                        <td>
                            <a href="{{  route('player-edit',$player->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            <a href="{{  route('remove-player',$player->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
                        </td>

                    </tr>
                @endforeach
            @else
            <tr>
                <td colspan="7">Record not found
                </td>
            </tr>
            @endif
        </tbody>
    </table>
    <div class="mt-5">
        {{-- {{ $players->links() }} --}}

        {{ $players->appends($_GET)->links() }}
    </div>
</div>
</body>

</html>
@endsection
