<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\CricketPlayer;
use App\CaptainPlayerTeam;
use App\Captain;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;


class CricketPlayerController extends Controller
{
    public function cricketForm(){
        return view('cricket.cricket_player_form');
    }

    public function playerInser(Request $request){
        $request->validate([
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'age'=>'required|numeric|digits:2',
            'building'=>'required|max:1',
            'flat_number'=>'required|numeric|min:3',
            'mobile'=>'required|numeric|digits:10|',
            'gender'=>'required',

        ]);

        $player = new CricketPlayer;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->mobile = $request->mobile;
        $player->age = $request->age;
        $player->building = $request->building;
        $player->flat_number = $request->flat_number;
        $player->gender = $request->gender;

        $player->save();

        return redirect()->route('player-list')->with('success','Data Enter Successfully');
    }

    public function palyerList(Request $request){
        // $inputs = $request->all();

        // $search = $request->search;
        // $mydate = $request->dfdgfdgdfgdfgdfate;
        // $building = $request->get('building');
        // dump($search);
        // dump($building);
        // dump($mydate);
        // dd($inputs);
        // dd($request->all());
        // dd($inputs['date']);


        $inputs = $request->all();
        // dump($request->search);
        // dd($request->building);
        $search = $request->search;
        $building = $request->building;
        $gender = $request->gender;
        $date = $request->date;
        // dump($search);
        // $search = $inputs['building'] ?? "";
        $players = new CricketPlayer();
        if(!empty($search)){
            // $ids = [10,11,12];
            // $players_ids  = CricketPlayer::whereIn('id',$ids)->pluck('id')->toArray();
            // dd($players_ids);
            // $players = $players->where('first_name', 'LIKE', "{$search}%")->orwhere('mobile', 'LIKE', "%{$search}%");
            $players = $players->where(function ($query) use ($search) {
                $query->where('first_name', 'LIKE', "{$search}%")
                ->orWhere('mobile', 'LIKE', "%{$search}%");
            });
            // ->whereNotIn('id',[17]);

            // ->whereIn('id',$players_ids);
        }
        // dd($players->get());
        if(!empty($building)){
            $players = $players->where('building', $building);
        }
        if(!empty($gender)){
            $players = $players->where('gender', $gender);
        }
        if(!empty($date)){
            $players = $players->whereDate('created_at',$date);
        }

        $players = $players->orderBy("id", "desc")->paginate(10);


        return view('cricket.cricket_player_list', compact('players','inputs'));
    }

    public function palyerEdit($id){
        $players = CricketPlayer::find($id);
        return view('cricket.cricket_player_edit',compact('players'));
    }

    public function updatePlayer(Request $request){

        $request->validate([
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'age'=>'required|numeric|digits:2',
            'building'=>'required|max:1',
            'flat_number'=>'required|numeric|min:3',
            'mobile'=>'required|numeric|digits:10',
            'gender'=>'required',

        ]);

        $player = CricketPlayer::find($request->id);


        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->mobile = $request->mobile;
        $player->age = $request->age;
        $player->building = $request->building;
        $player->flat_number = $request->flat_number;
        $player->gender = $request->gender;

        $player->save();

        return redirect()->route('player-list')->with('success','Data Update Successfully');
    }

    public function removePlayer($id){
        $players = CricketPlayer::find($id);
        $players->delete();
        return redirect()->route('player-list');
    }

    // captain

    public function captainForm(){
        return view('cricket.captain.captain_form');
    }

    public function captainInsert(Request $request){
        $request->validate([
            'name'=>'required|min:3'
        ]);

        $captain = new Captain;
        $captain->name = $request->name;
        $captain->save();

        return redirect()->route('captain-list')->with('success','Data Enter Successfully');
    }


    public function captainList(Request $request){
        $captains = Captain::get();
        return view('cricket.captain.captain_list', compact('captains'));
    }


    public function captainEdit($id){
        $captain = Captain::find($id);
        return view('cricket.captain.captain_edit',compact('captain'));
    }

    public function captainUpdate(Request $request){
        $request->validate([
            'name'=>'required|min:3'
        ]);

        $captain = Captain::find($request->id);
        $captain->name = $request->name;
        $captain->save();

        return redirect()->route('captain-list')->with('success','Data Update successfully');
    }

    public function removeCaptain($id){
        $captain = Captain::find($id);
        $captain->delete();
        return redirect()->route('captain-list');
    }

    public function captainPlayers(Request $request){
        $captains = Captain::orderBy('name','asc')->Pluck('name','id')->toArray();
        $players = CricketPlayer::orderBy('first_name','asc')->Pluck('first_name','id');
        return view('cricket.captain.team', compact('players','captains'));
    }
    public function captainPlayersInsert(Request $request){
        // dd($request->all());
        // $captain = new CaptainPlayerTeam;
        // $player = new CricketPlayer;
        $team = new CaptainPlayerTeam;
        $team->captain_id = $request->captain_id;
        $team->player_id = $request->player_id;

        $team->save();
        // dd($team);
        return redirect()->route('team-list')->with('success','Data Update successfully');
    }

    public function captainPlayersList(Request $request){

        $playername = $request->name;
        $search = $request->captain;
        $captains = Captain::Pluck('name','id')->toArray();
        $teams = CaptainPlayerTeam::with(['captain:id,name','player']);

        $teams = $teams->whereHas('player', function ($query) use ($playername){
            $query->where('first_name', 'like', '%'.$playername.'%');
        });
        if(!empty($search)){
            $teams = $teams->where('captain_id', $search);
        }
        $teams = $teams->get();
        // dd($teams);

       return view('cricket.captain.captain_team_list', compact('teams','search','captains','playername'));

    }



    public function removeTeamPlayer($id){
        $team = CaptainPlayerTeam::find($id);
        $team->delete();
        return redirect()->route('team-list');
    }



//  excel file create

    public function fileExport(Request $request)
    {

        return Excel::download(new UsersExport($request), 'players-list.xlsx');

    }








    // public function teamEdit($id){
    //     $teams = CaptainPlayerTeam::with(['captain:id,name','player'])->find($id);
    //     return view('cricket.captain.team_edti',compact('teams'));
    // }







    // registration and login

    public function showRegistrationForm(){
        return view('registration');
    }

    public function userInsert(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('team-list');
    }


    public function showLoginPage(){
        return view('login');
    }

    public function userLogin(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $login = $request->only('email','password');
        // dd(Auth::attempt($login));
        if(Auth::attempt($login)){
            return redirect()->route('player-list')->with('error','sss');
        }
        // dd($login);
        return redirect()->route('login')->with('error','Error');;
    }

}



