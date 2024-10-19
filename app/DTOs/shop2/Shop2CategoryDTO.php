<?php

namespace App\DTOs\shop2;

class Shop2CategoryDTO
{
    public function __construct(
        public string $name,
    ) {}

    public static function new(array $data): static {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => str_slug($this->name),
        ];
    }
}
