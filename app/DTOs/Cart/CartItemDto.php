<?php

namespace App\DTOs\Cart;

readonly class CartItemDto
{
    public function __construct(
        public int $product_id,
        public string $name,
        public float $price,
        public int $qty,
        public ?string $image = null,
    ) {}

    public function total(): float
    {
        return $this->price * $this->qty;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            product_id: (int) ($data['product_id'] ?? 0),
            name: $data['name'] ?? '',
            price: (float) ($data['price'] ?? 0),
            qty: (int) ($data['qty'] ?? 1),
            image: $data['image'] ?? null,
        );
    }
}
