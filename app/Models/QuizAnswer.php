<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnswers extends Model
{
    /**
     * Get the question that owns the answer.
     */
    public function answer()
    {
        return $this->belongsTo('\App\Models\QuizQuestions', 'question_id', 'id');
    }
}
