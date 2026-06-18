<?php

namespace App\Models\Support;

use App\Enums\FaqStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer',
        'category',
        'status',
        'order_index',
    ];

    protected $casts = [
        'status' => FaqStatus::class,
        'order_index' => 'integer',
    ];
}
