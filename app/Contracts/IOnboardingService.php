<?php

namespace App\Contracts;

use App\Models\Marketplace\Shop;
use App\Models\Profiles\BabysitterProfile;
use App\Models\Profiles\DoctorProfile;

interface IOnboardingService
{
    public function saveBabysitter(string $userId, array $data): BabysitterProfile;

    public function saveShopOwner(string $userId, array $data): Shop;

    public function saveDoctor(string $userId, array $data): DoctorProfile;

    public function saveParent(string $userId, array $data): void;
}
