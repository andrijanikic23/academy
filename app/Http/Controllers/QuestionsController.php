<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionsRequest;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function message(QuestionsRequest $request)
    {
        die("test123");
    }
}
