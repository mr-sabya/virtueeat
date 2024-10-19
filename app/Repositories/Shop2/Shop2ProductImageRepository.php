<?php

namespace App\Repositories\Shop2;

use App\Models\Shop2ProductImage;
use Illuminate\Database\Eloquent\Collection;

class Shop2ProductImageRepository
{
    private Shop2ProductImage $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new Shop2ProductImage();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(Shop2ProductImage $productImage): Shop2ProductImage
    {
        $productImage->save();
        return $productImage->fresh();
    }

    public function findById(int $id): Shop2ProductImage
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(Shop2ProductImage $productImage): bool
    {
        return $productImage->delete();
    }
}
