<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionsModel extends Model
{
    protected $table = "questions";

    protected $fillable = ["name", "email", "messsage"];
}
