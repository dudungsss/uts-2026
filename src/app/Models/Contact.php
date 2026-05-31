<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'message',
        'contact_type',
        'is_system_contact',
        'url',
        'icon',
        'display_order',
    ];

    protected $casts = [
        'is_system_contact' => 'boolean',
        'display_order' => 'integer',
    ];
}