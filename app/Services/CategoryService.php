<?php

namespace App\Services;

use App\DTOs\CategoryDTO;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    public function __construct(
        private CategoryRepository $repository
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(CategoryDTO $categoryDTO): Category
    {
        $category = new Category($categoryDTO->getModelArray());
        return $this->repository->save($category);
    }

    public function update(int $id, CategoryDTO $categoryDTO): Category
    {
        $category = $this->repository->findById($id);
        $category->fill($categoryDTO->getModelArray());
        return $this->repository->save($category);
    }

    public function deleteById(int $id): bool
    {
        $category = $this->repository->findById($id);
        return $this->repository->delete($category);
    }

    public function findById(int $id): Category
    {
        return $this->repository->findById($id);
    }

}
