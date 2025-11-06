<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewMemberRequest;
use App\Repositories\MembersRepository;
use Illuminate\Http\Request;

class CoachesController extends Controller
{
    private $membersRepo;

    public function __construct()
    {
        $this->membersRepo = new MembersRepository();
    }

    public function newMember(NewMemberRequest $request)
    {
        $this->membersRepo->addMember($request);

        return redirect()->back();
    }
}
