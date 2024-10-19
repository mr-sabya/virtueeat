<?php

namespace App\DTOs;


class ScheduleDTO
{
    public function __construct(
        public int $user_id,
        public array $sunday,
        public array $monday,
        public array $tuesday,
        public array $wednesday,
        public array $thursday,
        public array $friday,
        public array $saturday,
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
            'sunday' => $this->sunday,
            'monday' => $this->monday,
            'tuesday' => $this->tuesday,
            'wednesday' => $this->wednesday,
            'thursday' => $this->thursday,
            'friday' => $this->friday,
            'saturday' => $this->saturday
        ];
    }
}
