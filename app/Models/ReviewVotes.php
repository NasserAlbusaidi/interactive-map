<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewVotes extends Model
{
    use HasFactory;

    protected $table = 'review_votes';

    protected $fillable = [
        'review_id',
        'user_id',
        'upvote',
        'downvote',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class, 'review_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
