<?php

namespace App\Http\Controllers;
use App\Question;
use App\Http\Resources\QuestionCollection;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function questions(Request $request)
    {
        return new QuestionCollection(Question::all());
    }
}
