<?php

namespace App\Repositories;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Collection;

class SubCategoryRepository
{
    private SubCategory $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new SubCategory();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(SubCategory $category): SubCategory
    {
        $category->save();
        return $category->fresh();
    }

    public function findById(int $id): SubCategory
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(SubCategory $category): bool
    {
        return $category->delete();
    }
}
