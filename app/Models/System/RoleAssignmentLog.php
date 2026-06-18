<?php

namespace App\Models\System;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAssignmentLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'user_id',
        'old_role',
        'new_role',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function target()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
