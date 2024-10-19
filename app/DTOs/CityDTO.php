<?php

namespace App\DTOs;

class CityDTO
{
    public function __construct(
        public string $name,
        public int $country_id,
    ) {}

    public static function new(array $data): static {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'name' => $this->name,
            'country_id' => $this->country_id,
        ];
    }
}
