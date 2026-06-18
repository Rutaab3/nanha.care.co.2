<?php

namespace App\Models\Support;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];
}
