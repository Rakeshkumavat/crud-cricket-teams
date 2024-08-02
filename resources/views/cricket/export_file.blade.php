<table >
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Age</td>
            <td>Bulding/flat.No</td>
            <td>Mobile.No</td>
            <td>Gender</td>
        </tr>
    </thead>
    <tbody>
            @foreach ($players as $player)
                <tr>
                    <td>{{ $loop->iteration }}
                    <td>{{ $player->first_name }} {{ $player    ->last_name }}</td>
                    <td>{{ $player->age }}</td>
                    <td>{{ $player->building }}-{{ $player->flat_number }}</td>
                    <td>{{ $player->mobile }}</td>
                    <td>{{ $player->gender }}</td>

                </tr>
            @endforeach
    </tbody>
</table>
