<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\CricketPlayer;
use App\CaptainPlayerTeam;

class Captain extends Model
{
    public function players(){
        return $this->hasOne(CaptainPlayerTeam::class,'captain_id','player_id','id');
     }

}
