<?php

namespace App\Http\Controllers\Admin\Shop2;

use App\DTOs\shop2\Shop2CategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop2\Shop2CategoryRequest;
use App\Models\Shop2Category;
use App\Services\Shop2\Shop2CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Category';
        $items = Shop2Category::orderBy('id', 'DESC')->get();
        return view('backend.shop2.category.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add New Category';
        return view('backend.shop2.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Shop2CategoryRequest $request, Shop2CategoryService $service, int $id = null)
    {
        $data = $request->safe()->except(['_token']);
        
        if (is_null($id)) {
            $service->create(Shop2CategoryDTO::new($data));
            flash('Category Added Successfully!')->success();
        } else {
            $service->update($id, Shop2CategoryDTO::new($data));
            flash('Category Updated Successfully!')->success();
        }

        return redirect()->route('admin.productcategory.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Category';
        $item = Shop2Category::findOrFail(intval($id));
        return view('backend.shop2.category.create', compact('title', 'item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Shop2CategoryService $service)
    {
        if ($service->deleteById($id)) {
            flash('Category Deleted Successfully!')->success();
        } else {
            flash()->error("Category delete failed!");
        }
        return redirect()->route('admin.productcategory.index');
    }
}
