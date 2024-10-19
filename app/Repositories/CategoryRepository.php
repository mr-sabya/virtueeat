<?php
namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository
{
    private Category $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new Category();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(Category $category): Category
    {
        $category->save();
        return $category->fresh();
    }

    public function findById(int $id): Category
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(Category $category): bool
    {
        return $category->delete();
    }
}