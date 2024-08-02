<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CaptainPlayerTeam;
// use App\Captain;

class CricketPlayer extends Model
{
    public function captainteam(){
        return $this->hasOne(CaptainPlayerTeam::class,'captain_id','player_id','id');
     }
}
