<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'target_roles',
        'publish_at',
        'is_sent',
    ];

    protected $casts = [
        'target_roles' => 'array',
        'publish_at' => 'datetime',
        'is_sent' => 'boolean',
    ];
}
