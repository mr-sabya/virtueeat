<?php

namespace App\Services\Shop2;

use App\DTOs\shop2\Shop2ProductImageDTO;
use App\Models\Shop2ProductImage;
use App\Repositories\Shop2\Shop2ProductImageRepository;
use Illuminate\Database\Eloquent\Collection;

class Shop2ProductImageService
{
    public function __construct(
        private Shop2ProductImageRepository $repository
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(Shop2ProductImageDTO $productImageDTO): Shop2ProductImage
    {
        $product_image = new Shop2ProductImage($productImageDTO->getModelArray());
        return $this->repository->save($product_image);
    }

    public function update(int $id, Shop2ProductImageDTO $productImageDTO): Shop2ProductImage
    {
        $product_image = $this->repository->findById($id);
        $product_image->fill($productImageDTO->getModelArray());
        return $this->repository->save($product_image);
    }

    public function deleteById(int $id): bool
    {
        $product_image = $this->repository->findById($id);
        return $this->repository->delete($product_image);
    }

    public function findById(int $id): Shop2ProductImage
    {
        return $this->repository->findById($id);
    }

}
