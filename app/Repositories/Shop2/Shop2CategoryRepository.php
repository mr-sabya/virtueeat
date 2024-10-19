<?php

namespace App\Repositories\Shop2;

use App\Models\Shop2Category;
use Illuminate\Database\Eloquent\Collection;

class Shop2CategoryRepository
{
    private Shop2Category $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new Shop2Category();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(Shop2Category $category): Shop2Category
    {
        $category->save();
        return $category->fresh();
    }

    public function findById(int $id): Shop2Category
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(Shop2Category $category): bool
    {
        return $category->delete();
    }
}
