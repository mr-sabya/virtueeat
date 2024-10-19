<?php

namespace App\View\Components\Merchant;

use App\Models\Schedule;
use App\Services\ScheduleService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StoreHours extends Component
{
    public String $title;

    public ?Schedule $schedule;
    /**
     * Create a new component instance.
     */
    public function __construct(private ScheduleService $service)
    {
    }

    public function initData()
    {
        $this->title = 'Schedule';
        $this->schedule = $this->service->all();
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->initData();
        return view('components.merchant.store-hours');
    }
}
