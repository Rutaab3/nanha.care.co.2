<?php

namespace App\DTOs\Address;

readonly class AddressDto
{
    public function __construct(
        public string $name,
        public string $address,
        public string $city,
        public string $phone,
        public ?string $notes = null,
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            address: $data['address'] ?? '',
            city: $data['city'] ?? '',
            phone: $data['phone'] ?? '',
            notes: $data['notes'] ?? null,
        );
    }

    public function toString(): string
    {
        $str = "{$this->name}, {$this->address}, {$this->city}, {$this->phone}";

        if ($this->notes) {
            $str .= " ({$this->notes})";
        }

        return $str;
    }
}
