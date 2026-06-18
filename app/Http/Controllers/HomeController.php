<?php

namespace App\Http\Controllers;

use App\Contracts\IBabysitterService;
use App\Contracts\ISubscriptionService;

class HomeController extends Controller
{
    public function __construct(
        private readonly IBabysitterService $babysitterService,
        private readonly ISubscriptionService $subscriptionService,
    ) {}

    public function index()
    {
        $featuredBabysitters = $this->babysitterService->getFeatured();
        $plans = $this->subscriptionService->getPlans();

        $testimonials = [
            ['quote' => 'NanhaCare has been a lifesaver! Finding a trusted babysitter for my toddler was so easy.', 'rating' => 5, 'name' => 'Sarah Ahmed', 'city' => 'Karachi'],
            ['quote' => 'The verified profiles gave me peace of mind. Highly recommend this platform to all parents.', 'rating' => 5, 'name' => 'Fatima Khan', 'city' => 'Lahore'],
            ['quote' => 'Our babysitter is amazing with the kids. Thank you NanhaCare for connecting us!', 'rating' => 4, 'name' => 'Ayesha Malik', 'city' => 'Islamabad'],
        ];

        return view('home.index', compact('featuredBabysitters', 'plans', 'testimonials'));
    }

    public function about()
    {
        return view('home.about');
    }

    public function pricing()
    {
        $plans = $this->subscriptionService->getPlans();

        return view('home.pricing', compact('plans'));
    }

    public function training()
    {
        return view('home.training');
    }
}
