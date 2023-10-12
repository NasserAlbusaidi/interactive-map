<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'password',
        'start_time',
        'end_time',
        'duration',
        'timezone',
        'link',
        'date',
        'user_id',
        'ice_config'
    ];

    protected $casts = [
        'ice_config' => 'array',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDurationAttribute()
    {
        $this->attributes['duration'] = Carbon::parse($this->attributes['start_time'])->diffInMinutes(Carbon::parse($this->attributes['end_time']));
    }




}
