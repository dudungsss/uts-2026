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
        'non_functional_requirements',

        'main_features',

        'architecture',
        'architecture_flow',

        'erd_image',

        'flowchart_steps',
        'flowchart_image',

        'progress_status',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}