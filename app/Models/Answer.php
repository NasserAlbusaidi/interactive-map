<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['text', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function answerText()
    {
        return $this->text;
    }
}
