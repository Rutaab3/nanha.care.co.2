<?php

namespace App\Models\Payments;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentDetail extends Model
{
    protected $fillable = [
        'user_id',
        'method_type',
        'account_number',
        'account_title',
        'bank_name',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
