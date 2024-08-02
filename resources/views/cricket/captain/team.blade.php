@extends('cricket.layout.main')
@section('main-container')
<div class="container mb-3">
    <div class="text-right">
        <a class="btn btn-dark mt-2" href="{{ route('player-list') }}">Player List</a>
        <a class="btn btn-dark mt-2" href="{{ route('captain-list') }}">Captain List</a>
        <a class="btn btn-dark mt-2" href="{{  route('captain-form') }}">New Captain Add</a>
        <a class="btn btn-dark mt-2" href="{{  route('cricket-palyer-form') }}">New Player Add</a>
        <a class="btn btn-dark mt-2" href="{{  route('team-list') }}">Captain Team List</a>
    </div>
<form action="{{ route('team-insert') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="form-group col-md-3">
           <select class="form-control mt-2" name="captain_id" id="captain_id">
            <option value="">Select Capatin</option>
            @foreach ($captains as $key => $value)
            <option value="{{ $key }}">{{$value }}</option>
            @endforeach
           </select>
        </div>
        <div class="form-group col-md-3">
            <select class="form-control mt-2" name="player_id" id="player_id" >
                <option value="">Select players</option>
                @foreach ($players as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
         </div>
        <div class="form-group col-md-2">
            <button class="btn btn-primary mt-2" type="submit">Submit</button>
        </div>
    </div>
</form>
</div>
</body>

</html>
@endsection

