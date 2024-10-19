<?php

namespace App\Repositories\Shop2;

use App\Models\Shop2Product;
use Illuminate\Database\Eloquent\Collection;

class Shop2ProductRepository
{
    private Shop2Product $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new Shop2Product();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(Shop2Product $product): Shop2Product
    {
        $product->save();
        return $product->fresh();
    }

    public function findById(int $id): Shop2Product
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(Shop2Product $product): bool
    {
        return $product->delete();
    }
}
