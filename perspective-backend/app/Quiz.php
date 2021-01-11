<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table ='quiz';
    //
    protected $fillable = [
        'email'
    ];

    public static $rules = [
        'email' => 'required|unique'
    ];

    public function answers_quiz(){
        return $this->hasMany(AnswersQuiz::class);
    }
}
