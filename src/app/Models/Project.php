<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'tech_stack',
        'status',
        'thumbnail',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function report(): HasOne
    {
        return $this->hasOne(ProjectReport::class);
    }
}