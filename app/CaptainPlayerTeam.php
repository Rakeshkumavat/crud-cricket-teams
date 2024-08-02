<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CricketPlayer;
use App\Captain;
class CaptainPlayerTeam extends Model
{
    public function player(){
        return $this->belongsTo(CricketPlayer::class);
    }
    public function captain(){
        return $this->belongsTo(Captain::class);
    }
}
