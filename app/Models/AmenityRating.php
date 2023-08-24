<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenityRating extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'amenity_id', 'bathroom_id', 'rating'];

    public function amenity()
    {
        return $this->belongsTo(Amenity::class);
    }

    public function bathroom()
    {
        return $this->belongsTo(Bathroom::class);
    }
}
