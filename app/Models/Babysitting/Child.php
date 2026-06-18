<?php

namespace App\Models\Babysitting;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
        'parent_id',
        'name',
        'dob',
        'gender',
        'allergies',
        'special_needs',
    ];

    protected $casts = [
        'dob' => 'date',
        'allergies' => 'array',
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }
}
