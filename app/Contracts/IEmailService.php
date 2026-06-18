<?php

namespace App\Contracts;

interface IEmailService
{
    public function sendWelcome(string $userId): void;

    public function sendBookingConfirmation(int $bookingId): void;

    public function sendOrderConfirmation(int $orderId): void;

    public function sendPasswordReset(string $email, string $token): void;

    public function sendContactReply(int $ticketId): void;
}
