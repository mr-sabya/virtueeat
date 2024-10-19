<?php

namespace App\View\Components\Merchant;

use App\Services\MenuService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class MenuItem extends Component
{
    public String $title;

    public Collection $items;
    /**
     * Create a new component instance.
     */
    public function __construct(private MenuService $service)
    {
    }

    public function initData()
    {
        $this->title = 'Menu';
        $this->items = $this->service->all();
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->initData();
        return view('components.merchant.menu-item');
    }
}
