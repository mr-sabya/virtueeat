<?php
namespace App\Repositories;


use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Collection;

class MenuItemRepository
{
    private MenuItem $model;

    private const SORT_BY = 'DESC';

    public function __construct()
    {
        $this->model = new MenuItem();
    }

    public function getAll(): Collection
    {
        return $this->model->orderBy('id', self::SORT_BY)->get();
    }

    public function save(MenuItem $menu_item): MenuItem
    {
        $menu_item->save();
        return $menu_item->fresh();
    }

    public function findById(int $id): MenuItem
    {
        return $this->model->findOrFail($id);
    }
    
    public function delete(MenuItem $menu_item): bool
    {
        return $menu_item->delete();
    }
}