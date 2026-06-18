<?php

namespace App\Contracts;

use App\Models\Profiles\BabysitterProfile;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IBabysitterService
{
    public function getFeatured(): Collection;

    public function getAll(array $filters): LengthAwarePaginator;

    public function getById(int $id): BabysitterProfile;

    public function getCompletionPercentage(string $userId): int;
}
