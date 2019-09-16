<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * Get the user that owns the quiz.
     */
    public function creator()
    {
        return $this->belongsTo('\App\User', 'user_id', 'id');
    }

    /**
     * Get the questions for the quiz.
     */
    public function questions()
    {
        return $this->hasMany('App\Models\QuizQuestion', 'quiz_id', 'id');
    }
    /**
     * Get the answers for the questions.
     */
    public function answers()
    {
        return $this->hasManyThrough('App\Models\QuizAnswer', 'App\Models\QuizQuestion', 'quiz_id', 'question_id', 'id', 'id');
    }
}
