<?php

namespace App\DTOs;

class SubCategoryDTO
{
    public function __construct(
        public int $category_id,
        public string $name,
        public ?string $thumbnail
    ) {}

    public static function new(array $data): static {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'category_id' => $this->category_id,
            'name' => $this->name,
            'slug' => strtolower($this->name),
            'thumbnail' => $this->thumbnail
        ];
    }
}
