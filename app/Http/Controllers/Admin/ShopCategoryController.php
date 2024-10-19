<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShopCategory;
use Illuminate\Http\Request;

class ShopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'ShopCategory';
        $items = ShopCategory::orderBy('id', 'DESC')->get();
        return view('backend.shopcategory.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Shop Category';
        return view('backend.shopcategory.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, int $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['slug'] = str_slug($request->name);

        if (is_null($id)) {
            ShopCategory::create($data);
            flash('Category Added Successfully!')->success();
        } else {
            $shop = ShopCategory::findOrFail(intval($id));
            $shop->update($data);
            flash('Category Updated Successfully!')->success();
        }

        return redirect()->route('admin.shopcategory.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Shop Category';
        $item = ShopCategory::findOrFail(intval($id));
        return view('backend.shopcategory.create', compact('title', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (ShopCategory::destroy($id)) {
            flash('Category Deleted Successfully!')->success();
        } else {
            flash()->error("Category delete failed!");
        }
        return redirect()->route('admin.shopcategory.index');
    }
}
