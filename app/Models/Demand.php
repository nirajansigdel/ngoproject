<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Demand extends Model
{
    use HasFactory;

      protected $fillable = [
         'country_id',
        'heading',
        'subtitle', 
        'from_date',
        'to_date',
        'content',
        'image',
        'vacancy',
        'number_of_people_required',
        'type',
        'demand_types'
    ];

     protected $casts = [
    'demand_types' => 'array', // This will work with json column
    'from_date' => 'date',
    'to_date' => 'date',
];

    
    // Define relationship with Country
   public function country()
{
    return $this->belongsTo(Country::class);
}

    public function scopeActive(Builder $query)
    {
        return $query->where('to_date', '>=', now()->toDateString());
    }
}