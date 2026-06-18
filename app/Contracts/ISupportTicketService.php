<?php

namespace App\Contracts;

use App\Models\Support\SupportTicket;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ISupportTicketService
{
    public function getAll(array $filters): LengthAwarePaginator;

    public function getById(int $id): SupportTicket;

    public function create(array $data, string $userId): SupportTicket;

    public function reply(int $id, string $content, string $agentId, bool $isInternal = false): void;

    public function assign(int $id, string $agentId): void;

    public function escalate(int $id): void;

    public function close(int $id, string $agentId): void;
}
