@extends('cricket.layout.main')
@section('main-container')

    <body>


        <div class="container mb-3">
            <div class="text-right">
                <a class="btn btn-dark mt-2" href="{{ route('player-list') }}">Player List</a>
                <a class="btn btn-dark mt-2" href="{{ route('captain-list') }}">Captain List</a>
                <a class="btn btn-dark mt-2" href="{{ route('team') }}">Create team</a>
                <a class="btn btn-dark mt-2" href="{{ route('captain-form') }}">New Captain Add</a>
                <a class="btn btn-dark mt-2" href="{{ route('cricket-palyer-form') }}">New Player Add</a>
            </div>
            <form action="" method="">
                <div class="row">
                    <div class="form-group col-md-3">
                        <select name="captain" id="captain" class="form-control mt-2">
                            <option value="">Select Captain</option>
                            @foreach ($captains as $key => $value)
                                <option value="{{ $key }}"{{ $search == $key ? 'selected' : '' }}>
                                    {{ $value }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <input type="search" name="name" class="form-control mt-2" placeholder="Search by Players name "
                            value="{{ $playername }}" />
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
                        <td><b>ID </b></td>
                        <td><b>Team Name </b></td>
                        <td><b>Prayers Name </b></td>
                        <td><b>Flat Number </b></td>
                    </tr>
                </thead>
                <tbody>
                    @if ($teams->isNotEmpty())
                        @foreach ($teams as $team)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $team->captain->name }}</td>
                                <td>{{ $team->player->first_name }} {{ $team->player->last_name }}</td>
                                <td>{{ $team->player->building }}-{{ $team->player->flat_number }} </td>
                                <td>
                                    {{-- <a href="{{ route('team-edit',$team->id) }}" class="btn btn-dark btn-sm">Edit</a> --}}
                                    <a href="{{  route('remove-team',$team->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</a>
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
            {{-- <div class="form-group col-md-3">
                {{ $teams->links() }}
            </div> --}}
        </div>
    </body>

    </html>
@endsection
