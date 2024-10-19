<?php

namespace App\Services;

use App\DTOs\MenuItemDTO;
use App\Models\MenuItem;
use App\Repositories\MenuItemRepository;
use Illuminate\Database\Eloquent\Collection;

class MenuItemService
{
    public function __construct(
        private MenuItemRepository $repository
    ) {
    }

    public function all(): ?Collection
    {
        return $this->repository->getAll();
    }

    
    public function create(MenuItemDTO $menuItemDTO): MenuItem
    {
        $menu_item = new MenuItem($menuItemDTO->getModelArray());
        return $this->repository->save($menu_item);
    }

    public function update(int $id, MenuItemDTO $menuItemDTO): MenuItem
    {
        $menu_item = $this->repository->findById($id);
        $menu_item->fill($menuItemDTO->getModelArray());
        return $this->repository->save($menu_item);
    }

    public function deleteById(int $id): bool
    {
        $menu_item = $this->repository->findById($id);
        return $this->repository->delete($menu_item);
    }

    public function findById(int $id): MenuItem
    {
        return $this->repository->findById($id);
    }

}
