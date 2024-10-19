<?php

namespace App\Services;

use App\DTOs\DietaryDTO;
use App\Models\Dietary;
use App\Repositories\DietaryRepository;
use Illuminate\Database\Eloquent\Collection;

class DietaryService
{
    public function __construct(
        private DietaryRepository $repository
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(DietaryDTO $dietaryDTO): Dietary
    {
        $dietary = new Dietary($dietaryDTO->getModelArray());
        return $this->repository->save($dietary);
    }

    public function update(int $id, DietaryDTO $dietaryDTO): Dietary
    {
        $dietary = $this->repository->findById($id);
        $dietary->fill($dietaryDTO->getModelArray());
        return $this->repository->save($dietary);
    }

    public function deleteById(int $id): bool
    {
        $dietary = $this->repository->findById($id);
        return $this->repository->delete($dietary);
    }

    public function findById(int $id): Dietary
    {
        return $this->repository->findById($id);
    }

}
