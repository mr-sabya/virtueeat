<?php

namespace App\DTOs;

class CategoryDTO
{
    public function __construct(
        public string $name,
        public ?string $thumbnail
    ) {}

    public static function new(array $data): static {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'name' => $this->name,
            'slug' => strtolower($this->name),
            'thumbnail' => $this->thumbnail
        ];
    }
}
