<?php

namespace App\Services\Shop2;

use App\DTOs\shop2\Shop2ProductDTO;
use App\Models\Shop2Product;
use App\Repositories\Shop2\Shop2ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class Shop2ProductService
{
    public function __construct(
        private Shop2ProductRepository $repository
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(Shop2ProductDTO $productDTO): Shop2Product
    {
        $product = new Shop2Product($productDTO->getModelArray());
        return $this->repository->save($product);
    }

    public function update(int $id, Shop2ProductDTO $productDTO): Shop2Product
    {
        $product = $this->repository->findById($id);
        $product->fill($productDTO->getModelArray());
        return $this->repository->save($product);
    }

    public function deleteById(int $id): bool
    {
        $product = $this->repository->findById($id);
        return $this->repository->delete($product);
    }

    public function findById(int $id): Shop2Product
    {
        return $this->repository->findById($id);
    }

}
