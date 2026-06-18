<?php

namespace Database\Seeders;

use App\Enums\FaqStatus;
use App\Models\Support\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How do I create an account?',
                'answer' => 'Click on the Sign Up button on the top right corner, fill in your details, and verify your email address to get started.',
                'category' => 'Account',
                'status' => FaqStatus::Published,
                'order_index' => 1,
            ],
            [
                'question' => 'How do I book a babysitter?',
                'answer' => 'Browse available babysitters in your area, view their profiles and reviews, then select a date and time to send a booking request.',
                'category' => 'Booking',
                'status' => FaqStatus::Published,
                'order_index' => 2,
            ],
            [
                'question' => 'What payment methods are accepted?',
                'answer' => 'We accept credit/debit cards, JazzCash, and EasyPaisa for bookings and purchases on our platform.',
                'category' => 'Payments',
                'status' => FaqStatus::Published,
                'order_index' => 3,
            ],
            [
                'question' => 'How do I become a babysitter?',
                'answer' => 'Register as a parent first, then apply to become a babysitter from your profile settings. Your profile will be reviewed by our team.',
                'category' => 'Babysitter',
                'status' => FaqStatus::Published,
                'order_index' => 4,
            ],
            [
                'question' => 'How do I cancel a booking?',
                'answer' => 'Go to My Bookings, find the booking you wish to cancel, and click the Cancel button. Refund policies apply based on how far in advance you cancel.',
                'category' => 'Booking',
                'status' => FaqStatus::Published,
                'order_index' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
