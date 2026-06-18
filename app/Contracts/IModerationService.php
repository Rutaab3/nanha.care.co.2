<?php

namespace App\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface IModerationService
{
    public function getQueue(?string $type = null): Collection;

    public function approve(string $type, int $id, string $moderatorId): void;

    public function reject(string $type, int $id, string $reason, string $moderatorId): void;

    public function requestRevision(string $type, int $id, string $note, string $moderatorId): void;

    public function getPublished(?string $type = null): LengthAwarePaginator;

    public function getFlagged(): LengthAwarePaginator;

    public function dismissFlag(int $id): void;

    public function escalateFlag(int $id): void;
}
