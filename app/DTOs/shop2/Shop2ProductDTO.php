<?php

namespace App\DTOs\shop2;

class Shop2ProductDTO
{
    public function __construct(
        public string $name,
        public string $category_id,
        public float $price,
        public float $regular_price,
        public float $off,
        public string $description,
        public ?string $image,
        public ?string $image_alt,
    ) {}

    public static function new(array $data): static {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => str_slug($this->name),
            'category_id' => $this->category_id,
            'price' => $this->price,
            'regular_price' => $this->regular_price,
            'off' => $this->off,
            'description' => $this->description,
            'image' => $this->image,
            'image_alt' => $this->image_alt,
        ];
    }
}
