<?php

namespace App\Contracts;

use App\Models\Babysitting\Booking;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface IBookingService
{
    public function getByBabysitter(string $userId, ?string $status): LengthAwarePaginator;

    public function getByParent(string $userId, ?string $status): LengthAwarePaginator;

    public function create(array $data): Booking;

    public function accept(int $id, string $userId): void;

    public function decline(int $id, string $userId, string $reason): void;

    public function complete(int $id, string $userId): void;
}
