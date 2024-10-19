<?php

namespace App\DTOs\shop2;

class Shop2ProductColorDTO
{
    public function __construct(
        public string $name,
        public string $color_code,
    ) {}

    public static function new(array $data): static {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'name' => $this->name,
            'color_code' => $this->color_code,
        ];
    }
}
