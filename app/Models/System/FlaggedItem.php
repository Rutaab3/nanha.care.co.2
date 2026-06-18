<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlaggedItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'reporter_id',
        'flaggable_id',
        'flaggable_type',
        'reason',
        'status',
    ];

    public function flaggable()
    {
        return $this->morphTo();
    }

    public function reporter()
    {
        return $this->belongsTo(User::class, 'reporter_id');
    }
}
