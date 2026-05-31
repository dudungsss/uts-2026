<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'typing_texts',
        'tech_stacks',
        'hero_badge',
        'total_tech_stack',
        'dark_mode_status',
        'hero_description',
        'is_active',
    ];

    protected $casts = [
        'tech_stacks' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Auto-calculate total_tech_stack from tech_stacks array
            if (is_array($model->tech_stacks)) {
                $model->total_tech_stack = count($model->tech_stacks);
            }
        });
    }

    public static function active()
    {
        return self::where('is_active', true)->first() ?? self::first();
    }
}
