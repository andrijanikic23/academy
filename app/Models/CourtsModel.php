<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourtsModel extends Model
{
    protected $table = "courts";


    protected $fillable = ["name"];
}
