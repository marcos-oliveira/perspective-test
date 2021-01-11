<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswersQuiz extends Model
{
    protected $table = 'answers_quiz';
    //
    protected $fillable = [
        'quiz_id', 'question_id', 'answer'
    ];

    public static $rules = [
        'quiz_id' => 'required',
        'question_id' => 'required',
        'answer' => 'required'
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }
}
