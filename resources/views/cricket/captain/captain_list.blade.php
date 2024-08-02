@extends('cricket.layout.main')
@section('main-container')
<div class="container mb-3">
    <div class="text-right">
        <div class="text-right">
            <a class="btn btn-dark mt-2" href="{{ route('player-list') }}">Player List</a>
            <a class="btn btn-dark mt-2" href="{{  route('captain-form') }}">New Captain Add</a>
            <a class="btn btn-dark mt-2" href="{{  route('cricket-palyer-form') }}">New Player Add</a>
            <a class="btn btn-dark mt-2" href="{{  route('team-list') }}">Captain Team List</a>
        </div>
    </div>
    {{-- <form action="" method="">
        <div class="row">
            <div class="form-group col-md-3">
                <input type="search" name="search" class="form-control mt-2" placeholder="Search by name " value="{{ isset($inputs['search']) ? $inputs['search'] : '' }}"/>
            </div>
            <div class="form-group col-md-3">
               <select name="building" class="form-control mt-2">
                <option value="">Select Building</option>
                <option value="a" {{ isset($inputs['building']) && $inputs['building'] == 'a' ? 'selected' : '' }}>a</option>
                <option value="b" {{ isset($inputs['building']) && $inputs['building'] == 'b' ? 'selected' : '' }}>b</option>
                <option value="c" {{ isset($inputs['building']) && $inputs['building'] == 'c' ? 'selected' : '' }}>c</option>

               </select>
            </div>
            <div class="form-group col-md-2">
                <button class="btn btn-primary mt-2" type="submit">Search</button>
            </div>
        </div>
    </form> --}}





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
            </tr>
        </thead>
        <tbody>
            @if ($captains->isNotEmpty())


                @foreach ($captains as $captain)
                    <tr>
                        <td>{{ $loop->iteration }}
                        <td>{{ $captain->name }}</td>
                        <td>
                            <a href="{{  route('captain-edit',$captain->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            <a href="{{  route('remove-captain',$captain->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
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
    {{-- <div class="mt-5">
        {{ $players->links() }}
    </div> --}}
</div>
</body>

</html>
@endsection
