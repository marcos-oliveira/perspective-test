<?php

namespace App\Http\Controllers;
use App\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function index(Request $request)
    {
        return response()->json(Question::all(), 201);
    }
}
