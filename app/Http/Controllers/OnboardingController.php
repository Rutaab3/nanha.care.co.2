<?php

namespace App\Http\Controllers;

use App\Contracts\IOnboardingService;
use App\Http\Requests\Onboarding\BabysitterOnboardingRequest;
use App\Http\Requests\Onboarding\DoctorOnboardingRequest;
use App\Http\Requests\Onboarding\ParentOnboardingRequest;
use App\Http\Requests\Onboarding\ShopOwnerOnboardingRequest;

class OnboardingController extends Controller
{
    public function __construct(
        private readonly IOnboardingService $onboardingService,
    ) {}

    public function babysitter()
    {
        return view('onboarding.babysitter');
    }

    public function saveBabysitter(BabysitterOnboardingRequest $request)
    {
        $this->onboardingService->saveBabysitter(auth()->id(), $request->validated());

        return redirect('/dashboard/babysitter')->with('success', 'Profile submitted for verification');
    }

    public function shopOwner()
    {
        return view('onboarding.shop-owner');
    }

    public function saveShopOwner(ShopOwnerOnboardingRequest $request)
    {
        $this->onboardingService->saveShopOwner(auth()->id(), $request->validated());

        return redirect('/dashboard/shop-owner')->with('success', 'Shop created successfully');
    }

    public function doctor()
    {
        return view('onboarding.doctor');
    }

    public function saveDoctor(DoctorOnboardingRequest $request)
    {
        $this->onboardingService->saveDoctor(auth()->id(), $request->validated());

        return redirect('/dashboard/doctor')->with('success', 'Profile submitted for verification');
    }

    public function parent()
    {
        return view('onboarding.parent');
    }

    public function saveParent(ParentOnboardingRequest $request)
    {
        $this->onboardingService->saveParent(auth()->id(), $request->validated());

        return redirect('/dashboard/parent')->with('success', 'Profile completed successfully');
    }
}
