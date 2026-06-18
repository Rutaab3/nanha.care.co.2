<?php

namespace App\Contracts;

use App\Models\Marketplace\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IMarketplaceService
{
    public function getProducts(array $filters): LengthAwarePaginator;

    public function getProductById(int $id): Product;

    public function getRelatedProducts(int $productId): Collection;

    public function getCategories(): array;

    public function getShops(): Collection;
}
