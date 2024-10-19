<?php
namespace App\Repositories;

use App\Models\Schedule;

class ScheduleRepository
{
    private Schedule $model;

    public function __construct()
    {
        $this->model = new Schedule();
    }

    public function getAll(int $id): ?Schedule
    {
        return $this->model->where('shop_id', $id)->first();
    }

    public function save(Schedule $schedule): Schedule
    {
        $schedule->save();
        return $schedule->fresh();
    }

    public function findById(int $id): Schedule
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(Schedule $schedule): bool
    {
        return $schedule->delete();
    }
}