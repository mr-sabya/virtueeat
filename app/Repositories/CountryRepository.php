<?php
namespace App\Repositories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;

class CountryRepository
{
    private Country $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new Country();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(Country $country): Country
    {
        $country->save();
        return $country->fresh();
    }

    public function findById(int $id): Country
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(Country $country): bool
    {
        return $country->delete();
    }
}