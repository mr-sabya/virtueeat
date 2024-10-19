<?php
namespace App\Repositories;

use App\Models\Dietary;
use Illuminate\Database\Eloquent\Collection;

class DietaryRepository
{
    private Dietary $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new Dietary();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(Dietary $dietary): Dietary
    {
        $dietary->save();
        return $dietary->fresh();
    }

    public function findById(int $id): Dietary
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(Dietary $dietary): bool
    {
        return $dietary->delete();
    }
}