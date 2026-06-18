<?php

namespace App\Contracts;

interface IDashboardService
{
    public function getAdminOverview(): array;

    public function getModeratorOverview(): array;

    public function getBabysitterOverview(string $userId): array;

    public function getParentOverview(string $userId): array;

    public function getShopOwnerOverview(string $userId): array;

    public function getDoctorOverview(string $userId): array;

    public function getSupportOverview(string $userId): array;
}
