<?php

namespace App\Contracts;

interface INotificationService
{
    public function send(string $userId, string $type, string $message, ?string $link = null): void;

    public function markRead(int $id, string $userId): void;

    public function markAllRead(string $userId): void;

    public function delete(int $id, string $userId): void;

    public function broadcast(array $roles, string $message, ?string $link = null): void;
}
