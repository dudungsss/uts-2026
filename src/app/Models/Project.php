<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;

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

    public function getTechStackListAttribute(): array
    {
        if (! $this->tech_stack) {
            return [];
        }

        return array_values(array_filter(array_map(
            'trim',
            explode(',', $this->tech_stack)
        )));
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        if (! $this->thumbnail) {
            return null;
        }

        return Storage::url($this->thumbnail);
    }

    public function getStatusClassAttribute(): string
    {
        return match ($this->status) {
            'active' => 'active',
            'done', 'completed' => 'done',
            default => 'wip',
        };
    }
}