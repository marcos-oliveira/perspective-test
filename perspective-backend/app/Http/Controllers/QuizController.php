<?php

namespace App\Http\Controllers;
use App\Question;
use App\Quiz;
use App\AnswersQuiz;
use Validator;
use DB;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Question::all(), 201);
    }

    public function quiz($email, Request $request)
    {
        return response()->json(Quiz::where('email', $email)->get(), 201);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:quiz'
        ]);
        if ($validator->fails()) {
            $response['message'] = $validator->messages();
            $response['success'] = false;
            return response()->json($response, 400);
        }
        //TODO if some question is not answered
        $request_data = $request->all();

        try {
            DB::beginTransaction();
            $quiz = Quiz::create(['email'=>$request_data['email']]);
            
            foreach($request_data['answers'] as $answer){
                AnswersQuiz::create(['quiz_id'=>$quiz->id, 'question_id'=>$answer['question_id'], 'answer'=>$answer['answer']]);
            }
            DB::commit();

            return redirect()->route('api.mbti', ['email'=>$request_data['email']]); 
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            return response()->json('Internal Server Error', 500);
        }       
    }
    public function mbti(Request $request){
        return response()->json(AnswersQuiz::all(), 201);
    }
}
