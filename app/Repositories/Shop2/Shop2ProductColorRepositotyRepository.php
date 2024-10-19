<?php

namespace App\Repositories\Shop2;

use App\Models\Shop2ProductColor;
use Illuminate\Database\Eloquent\Collection;

class Shop2ProductColorRepositotyRepository
{
    private Shop2ProductColor $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new Shop2ProductColor();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(Shop2ProductColor $product_color): Shop2ProductColor
    {
        $product_color->save();
        return $product_color->fresh();
    }

    public function findById(int $id): Shop2ProductColor
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(Shop2ProductColor $product_color): bool
    {
        return $product_color->delete();
    }
}
