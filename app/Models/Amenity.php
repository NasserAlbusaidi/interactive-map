<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $appends = ['icon'];
    public function bathrooms()
    {
        return $this->belongsToMany(Bathroom::class, 'bathroom_amenity'); // Adjust the table name if it's different
    }

    public function getIconAttribute()
    {
        $icons = [
            'Toilet' => 'fas fa-toilet',
            'Sink' => 'fas fa-faucet',
            'Soap' => 'fas fa-hand-holding-water',
            'Paper-towels' => 'fas fa-toilet-paper',
            'Baby-changing-station' => 'fas fa-baby',
            'Handicap-accessible' => 'fas fa-wheelchair',
            'Feminine-products' => 'fas fa-venus',
            'Urinal' => 'fas fa-venus-mars',
            'Bidet' => 'fas fa-shower',
            'Shower' => 'fas fa-shower',
            'Mirror' => 'fas fa-mirror',
            'Trash-can' => 'fas fa-trash',
            'Hand-dryer' => 'fas fa-wind',
            'Wifi' => 'fas fa-wifi',
            'Outlet' => 'fas fa-plug',
            'Water' => 'fas fa-tint',
            'Changing-table' => 'fas fa-baby',
            'Sanitary-products' => 'fas fa-venus',
            'Sanitary-products-disposal' => 'fas fa-venus',

        ];

        return $icons[$this->name] ?? 'fas fa-question';
    }

}
