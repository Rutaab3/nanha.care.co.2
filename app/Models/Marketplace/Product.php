<?php

namespace App\Models\Marketplace;

use App\Enums\ContentStatus;
use App\Enums\ProductCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'description',
        'price',
        'sale_price',
        'stock_qty',
        'category',
        'age_tags',
        'weight',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'category' => ProductCategory::class,
        'status' => ContentStatus::class,
        'age_tags' => 'array',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }
}
