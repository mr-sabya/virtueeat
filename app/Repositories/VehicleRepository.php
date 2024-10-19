<?php
namespace App\Repositories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Collection;

class VehicleRepository
{
    private Vehicle $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new Vehicle();
    }

    public function getAll($id): Collection
    {
        return $this->model->where('user_id', $id)->orderBy('id', self::SORT_BY)->get();
    }

    public function save(Vehicle $vehicle): Vehicle
    {
        $vehicle->save();
        return $vehicle->fresh();
    }

    public function findById(int $id): Vehicle
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(Vehicle $vehicle): bool
    {
        return $vehicle->delete();
    }
}