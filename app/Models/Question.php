<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['text', 'category_id'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function correctAnswer()
    {
        return $this->belongsTo(Answer::class, 'correct_answer_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
