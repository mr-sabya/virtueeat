<?php

namespace App\Services;

use App\DTOs\CityDTO;
use App\Models\City;
use App\Repositories\CityRepository;
use Illuminate\Database\Eloquent\Collection;

class CityService
{
    public function __construct(
        private CityRepository $repository
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(CityDTO $countryDTO): City
    {
        $country = new City($countryDTO->getModelArray());
        return $this->repository->save($country);
    }

    public function update(int $id, CityDTO $countryDTO): City
    {
        $country = $this->repository->findById($id);
        $country->fill($countryDTO->getModelArray());
        return $this->repository->save($country);
    }

    public function deleteById(int $id): bool
    {
        $country = $this->repository->findById($id);
        return $this->repository->delete($country);
    }

    public function findById(int $id): City
    {
        return $this->repository->findById($id);
    }

}
