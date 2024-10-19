<?php

namespace App\Services;

use App\DTOs\VehicleDTO;
use App\Models\Vehicle;
use App\Repositories\VehicleRepository;
use Illuminate\Database\Eloquent\Collection;

class VehicleService
{
    public function __construct(
        private VehicleRepository $repository
    ) {
    }

    public function all($id): ?Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(VehicleDTO $menuDTO): Vehicle
    {
        $menu = new Vehicle($menuDTO->getModelArray());
        return $this->repository->save($menu);
    }

    public function update(int $id, VehicleDTO $menuDTO): Vehicle
    {
        $menu = $this->repository->findById($id);
        $menu->fill($menuDTO->getModelArray());
        return $this->repository->save($menu);
    }

    public function deleteById(int $id): bool
    {
        $menu = $this->repository->findById($id);
        return $this->repository->delete($menu);
    }

    public function findById(int $id): Vehicle
    {
        return $this->repository->findById($id);
    }

}
