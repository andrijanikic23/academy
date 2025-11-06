<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeesModel extends Model
{
    protected $table = "staff";

    protected $fillable = ["name", "surname", "email", "role", "image_url", "phone_number", "date_of_birth", "employment_status"];
}
