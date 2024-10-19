<?php

namespace App\Livewire\Frontend\Feed;

use App\Models\Category;
use App\Models\Location;
use App\Models\Shop;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{

    public $activeClass = '', $shops, $location;



    public function mount($location)
    {
        $this->location = $location;
        // dd($location);
        $this->shops = Shop::orderBy('company_name', 'ASC')->where('location_id', $this->location)->get();
    }


    public function getProductByCategory($id)
    {
        $category = Category::find($id);
        $categoryId = $category->id;

        if ($this->activeClass != $category->slug) {
            $this->activeClass = $category->slug;
            $this->shops = Shop::where('location_id', $this->location)->whereHas('items', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            })->get();
        } else {
            $this->activeClass = '';
            $this->shops = Shop::orderBy('company_name', 'ASC')->where('location_id', $this->location)->get();
        }

        $this->dispatch('slickInitialized');
    }

    public function render()
    {
        return view('livewire.frontend.feed.index', [
            'categories' => Category::orderBy('name', 'ASC')->get(),
        ]);
    }
}
