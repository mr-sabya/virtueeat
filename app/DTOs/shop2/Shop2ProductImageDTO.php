<?php

namespace App\DTOs\shop2;

class Shop2ProductImageDTO
{
    public function __construct(
        public string $product_id,
        public string $name,
        public ?string $image,
        public ?string $image_alt,
    ) {}

    public static function new(array $data): static {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'product_id' => $this->product_id,
            'name' => $this->name,
            'image' => $this->image,
            'image_alt' => $this->image_alt,
        ];
    }
}
