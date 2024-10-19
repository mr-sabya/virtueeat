<?php

namespace App\Services;

use App\DTOs\CountryDTO;
use App\Models\Country;
use App\Repositories\CountryRepository;
use Illuminate\Database\Eloquent\Collection;

class CountryService
{
    public function __construct(
        private CountryRepository $repository
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(CountryDTO $countryDTO): Country
    {
        $country = new Country($countryDTO->getModelArray());
        return $this->repository->save($country);
    }

    public function update(int $id, CountryDTO $countryDTO): Country
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

    public function findById(int $id): Country
    {
        return $this->repository->findById($id);
    }

}
