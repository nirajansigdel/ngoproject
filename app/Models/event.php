<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'image',
        'slug',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Auto-generate slug when creating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });

        static::updating(function ($event) {
            if ($event->isDirty('title')) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    // Scope for active events
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    // Get image URL
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('uploads/events/' . $this->image) : null;
    }
}