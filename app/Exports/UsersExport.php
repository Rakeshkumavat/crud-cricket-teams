<?php

namespace App\Exports;

use App\CricketPlayer;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromView
{




    public function __construct($request){
        $this->request = $request;
        // $this->users = $users;
    }

    public function view(): View
    {
        // $search = $request->search;
        $players = new CricketPlayer();

        // dd($this->request->get('search'));
        if($this->request->get('gender') != "" ){
            $players = $players->where('gender', 'like', '%'.$this->request->get('gender').'%');

        }
        $players = $players->get();

        return view('cricket.export_file', ['players' => $players]);
    }
}
