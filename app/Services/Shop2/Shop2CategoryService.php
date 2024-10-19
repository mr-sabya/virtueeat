<?php

namespace App\Services\Shop2;

use App\DTOs\shop2\Shop2CategoryDTO;
use App\Models\Shop2Category;
use App\Repositories\Shop2\Shop2CategoryRepository;
use Illuminate\Database\Eloquent\Collection;

class Shop2CategoryService
{
    public function __construct(
        private Shop2CategoryRepository $repository
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(Shop2CategoryDTO $categoryDTO): Shop2Category
    {
        $category = new Shop2Category($categoryDTO->getModelArray());
        return $this->repository->save($category);
    }

    public function update(int $id, Shop2CategoryDTO $categoryDTO): Shop2Category
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

    public function findById(int $id): Shop2Category
    {
        return $this->repository->findById($id);
    }

}
