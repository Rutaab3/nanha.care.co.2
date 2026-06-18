<?php

namespace App\Contracts;

use App\Models\Marketplace\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IProductService
{
    public function getByShopOwner(string $userId, array $filters): LengthAwarePaginator;

    public function create(array $data, string $userId): Product;

    public function update(int $id, array $data, string $userId): Product;

    public function delete(int $id, string $userId): void;

    public function duplicate(int $id, string $userId): Product;

    public function deleteImage(int $imageId, string $userId): void;
}
