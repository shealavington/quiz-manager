<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizQuestions extends Model
{
    /**
     * Get the quiz that owns the question.
     */
    public function quiz()
    {
        return $this->belongsTo('\App\Models\Quiz', 'quiz_id', 'id');
    }

    /**
     * Get the answers for the question.
     */
    public function answers()
    {
        return $this->hasMany('\App\Models\QuizAnswers', 'question_id', 'id');
    }
}
