<?php

namespace App\Models\Marketplace;

use App\Enums\OrderStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'shipping_address',
        'payment_method',
        'status',
        'total',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
        'shipping_address' => 'array',
        'total' => 'decimal:2',
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
