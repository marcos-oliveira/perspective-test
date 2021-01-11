<?php

namespace App\Http\Controllers;
use App\Quiz;
use App\AnswersQuiz;
use App\Dimension;
use Validator;
use DB;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index(Request $request)
    {
        return response()->json(Quiz::all(), 201);
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
            return response()->json(['message' => 'Internal Server Error'], 500);
        }       
    }

    public function show($email, Request $request)
    {
        $quiz = Quiz::where('email', $email)->first();
        if($quiz){
            $answers = array();
            foreach($quiz->answers_quiz as $answer){
                array_push($answers, [
                    'question'=>$answer->question,
                    'answer'=>$answer->answer
                ]);
            }
            $response = ['email'=>$email, 'answers'=>$answers];
            return response()->json($response, 201);
        }else{
            return response()->json(['message' => 'Not Found'], 400);
        }

    }

    public function mbti($email){
        $quiz = Quiz::where('email', $email)->first();
        if($quiz){
            $mbti = array();
            foreach(Dimension::all() as $dimension){
                $mbti[$dimension->id]['score'] = 0;
                $mbti[$dimension->id]['left_initial'] = $dimension->left->meaning;
                $mbti[$dimension->id]['left_description'] = $dimension->left->description;
                $mbti[$dimension->id]['right_initial'] = $dimension->right->meaning;
                $mbti[$dimension->id]['right_description'] = $dimension->right->description;
            }
            foreach($quiz->answers_quiz as $answer){
                if($answer->question->direction>0){
                    $mbti[$answer->question->dimension_id]['score'] += $answer->answer-4;
                }else{
                    $mbti[$answer->question->dimension_id]['score'] += 4-$answer->answer;
                }
            }
            $result = '';
            foreach($mbti as $mbti_dimension){
                $result .= trim($mbti_dimension['score']<=0?$mbti_dimension['left_initial']:$mbti_dimension['right_initial']);
            }
            $response = ['email'=>$email, 'result'=>$result, 'mbti'=>$mbti];
            return response()->json($response, 201);
        }else{
            return response()->json(['message' => 'Not Found'], 400);
        }
        return response()->json(AnswersQuiz::all(), 201);
    }
}
