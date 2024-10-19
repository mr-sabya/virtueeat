<?php

namespace App\DTOs;

class VehicleDTO
{
    public function __construct(
        public int $user_id,
        public int $vehicle_type,
        public array $documents,
        public string|null $thumbnail = null
    ) {}

    public static function new(array $data): static {
        return new static(...$data);
    }

    public function getModelArray(): array
    {
        return [
            'user_id' => $this->user_id,
            'vehicle_type' => $this->vehicle_type,
            'documents' => $this->documents,
            'thumbnail' => $this->thumbnail
        ];
    }
}
