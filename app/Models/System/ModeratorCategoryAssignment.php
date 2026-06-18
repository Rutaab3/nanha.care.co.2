<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeratorCategoryAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'moderator_id',
        'category',
    ];

    public function moderator()
    {
        return $this->belongsTo(User::class, 'moderator_id');
    }
}
