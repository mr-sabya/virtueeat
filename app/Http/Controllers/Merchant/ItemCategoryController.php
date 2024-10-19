<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\ItemCategory;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Item Category';
        $shop = Auth::user()->businessAccount;
        $items = ItemCategory::where('shop_id', $shop->id)->get();
        return view('merchant.itemcategory.index', compact('title', 'shop', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Item Category';
        $shop = Auth::user()->businessAccount;
        return view('merchant.itemcategory.create', compact('title', 'shop'));
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

        return redirect()->route('merchant.itemcategory.index');
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
        //
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
        //
    }
}
