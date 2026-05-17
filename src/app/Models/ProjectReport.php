<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectReport extends Model
{
    protected $fillable = [
        'project_id',
        'problem_analysis',
        'system_requirements',
        'main_features',
        'architecture',
        'erd_image',
        'flowchart_image',
        'progress_status',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}