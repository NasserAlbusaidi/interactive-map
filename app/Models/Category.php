<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getQuestionCountAttribute()
    {
        return $this->questions()->count();
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
