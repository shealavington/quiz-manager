<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    /**
     * Get the question that owns the answer.
     */
    public function answer()
    {
        return $this->belongsTo('App\Models\QuizQuestion', 'question_id', 'id');
    }
}
