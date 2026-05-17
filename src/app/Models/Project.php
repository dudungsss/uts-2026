<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function report()
    {
        return $this->hasOne(ProjectReport::class);
    }
}
