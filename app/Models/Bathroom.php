<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bathroom extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'latitude', 'longitude'];

    // Many-to-many relationship with amenities
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'bathroom_amenity'); // Adjust the table name if it's different
    }

    // One-to-many relationship with images
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // One-to-many relationship with reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
