<?php

namespace App\Services;

use App\DTOs\ScheduleDTO;
use App\Models\Schedule;
use App\Repositories\ScheduleRepository;

class ScheduleService
{
    public function __construct(
        private ScheduleRepository $repository
    ) {
    }

    public function all(): ?Schedule
    {
        return $this->repository->getAll(auth()->user()->id);
    }

    
    public function create(ScheduleDTO $scheduleDTO): Schedule
    {
        $schedule = new Schedule($scheduleDTO->getModelArray());
        return $this->repository->save($schedule);
    }

    public function update(int $id, ScheduleDTO $scheduleDTO): Schedule
    {
        $schedule = $this->repository->findById($id);
        $schedule->fill($scheduleDTO->getModelArray());
        return $this->repository->save($schedule);
    }

    public function deleteById(int $id): bool
    {
        $schedule = $this->repository->findById($id);
        return $this->repository->delete($schedule);
    }

    public function findById(int $id): Schedule
    {
        return $this->repository->findById($id);
    }

}
