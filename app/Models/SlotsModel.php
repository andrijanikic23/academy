<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlotsModel extends Model
{
    protected $table = "slots";


    protected $fillable = ["court_id", "user_id", "date", "time", "status"];
}
