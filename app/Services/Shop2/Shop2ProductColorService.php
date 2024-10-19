<?php

namespace App\Services\Shop2;

use App\DTOs\shop2\Shop2ProductColorDTO;
use App\Models\Shop2ProductColor;
use App\Repositories\Shop2\Shop2ProductColorRepositotyRepository;
use Illuminate\Database\Eloquent\Collection;

class Shop2ProductColorService
{
    public function __construct(
        private Shop2ProductColorRepositotyRepository $repository
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(Shop2ProductColorDTO $productColorDTOP): Shop2ProductColor
    {
        $product_color = new Shop2ProductColor($productColorDTOP->getModelArray());
        return $this->repository->save($product_color);
    }

    public function update(int $id, Shop2ProductColorDTO $productColorDTOP): Shop2ProductColor
    {
        $product_color = $this->repository->findById($id);
        $product_color->fill($productColorDTOP->getModelArray());
        return $this->repository->save($product_color);
    }

    public function deleteById(int $id): bool
    {
        $product_color = $this->repository->findById($id);
        return $this->repository->delete($product_color);
    }

    public function findById(int $id): Shop2ProductColor
    {
        return $this->repository->findById($id);
    }

}
