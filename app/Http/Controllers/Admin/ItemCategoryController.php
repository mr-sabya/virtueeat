<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'ItemCategory';
        $items = ItemCategory::orderBy('id', 'DESC')->paginate(15);
        return view('backend.itemcategory.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Item Category';
        return view('backend.itemcategory.create', compact('title'));
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

        if( ! empty($request->icon) && $request->icon instanceof UploadedFile) {
            $data['icon'] = is_null($id) ? FileUploadHelper::store($request->icon, 'categories'):FileUploadHelper::store($request->icon, 'categories', ItemCategory::find($id)->icon);
        }else {
            $data['icon'] = is_null($id) ? null:ItemCategory::find($id)->icon;
        }

        if (is_null($id)) {
            ItemCategory::create($data);
            flash('Category Added Successfully!')->success();
        } else {
            $shop = ItemCategory::findOrFail(intval($id));
            $shop->update($data);
            flash('Category Updated Successfully!')->success();
        }

        return redirect()->route('admin.itemcategory.index');
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
        $title = 'Edit Item Category';
        $item = ItemCategory::findOrFail(intval($id));
        return view('backend.itemcategory.create', compact('title', 'item'));
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
        $item = ItemCategory::findOrFail(intval($id));
        if($item->delete()){
            flash('Category Deleted Successfully!')->success();
        } else {
            flash()->error("Category delete failed!");
        }

        return redirect()->route('admin.itemcategory.index');
    }
}
