<?php

namespace App\DTOs;


class MenuItemDTO
{
    public function __construct(
        public int $user_id,
        public int $shop_id,
        public array $item_category,
        public string $name,
        public string $price,
        public string $description,
        public ?string $thumbnail = '',
        public int $category_id,
        public bool $dietary_id,
        public string $delivery_time,
    ) {
    }

    public static function new(array $data): static
    {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'shop_id' => $this->shop_id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'category_id' => $this->category_id,
            'dietary_id' => $this->dietary_id,
            'delivery_time' => $this->delivery_time,
        ];
    }
}
