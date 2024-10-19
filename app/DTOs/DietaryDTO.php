<?php

namespace App\DTOs;

class DietaryDTO
{
    public function __construct(
        public string $name
    ) {}

    public static function new(array $data): static {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'name' => $this->name
        ];
    }
}
