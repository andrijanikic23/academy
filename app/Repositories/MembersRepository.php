<?php

namespace App\Repositories;


use App\Models\EmployeesModel;

class MembersRepository
{
    private $employeesModel;

    public function __construct()
    {
        $this->employeesModel = new EmployeesModel();
    }

    public function addMember($request)
    {
        $name = $request->name;
        $surname = $request->surname;
        $email = $request->email;
        $role = $request->role;
        $imageUrl = $request->image_url;
        $dateOfBirth = $request->date_of_birth;
        $phoneNumber = $request->phone_number;
        $status = $request->status;

        $this->employeesModel::create([
            "name" => $name,
            "surname" => $surname,
            "email" => $email,
            "role" => $role,
            "image_url" => $imageUrl,
            "phone_number" => $phoneNumber,
            "date_of_birth" => $dateOfBirth,
            "employment_status" => $status
        ]);
    }
}
