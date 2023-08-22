<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['bathroom_id', 'author', 'text', 'rating', 'user_id', 'date'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class);
    }

    public function votes()
    {
        return $this->hasMany(ReviewVotes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
