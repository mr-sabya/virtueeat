<?php
namespace App\Repositories;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityRepository
{
    private City $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new City();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(City $country): City
    {
        $country->save();
        return $country->fresh();
    }

    public function findById(int $id): City
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(City $country): bool
    {
        return $country->delete();
    }
}