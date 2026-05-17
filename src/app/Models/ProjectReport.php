<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
