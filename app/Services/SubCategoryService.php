<?php

namespace App\Services;

use App\DTOs\SubCategoryDTO;
use App\Models\SubCategory;
use App\Repositories\SubCategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class SubCategoryService
{
    public function __construct(
        private SubCategoryRepository $repository
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(SubCategoryDTO $categoryDTO): SubCategory
    {
        $category = new SubCategory($categoryDTO->getModelArray());
        return $this->repository->save($category);
    }

    public function update(int $id, SubCategoryDTO $categoryDTO): SubCategory
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

    public function findById(int $id): SubCategory
    {
        return $this->repository->findById($id);
    }

}
