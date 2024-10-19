<?php

namespace App\Http\Controllers\Merchant;

use App\DTOs\MenuItemDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Merchant\MenuItemRequest;
use App\Models\Category;
use App\Models\Dietary;
use App\Models\Extra;
use App\Models\ItemCategory;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Services\CategoryService;
use App\Services\MenuItemService;
use App\Services\MenuService;
use App\Services\SubCategoryService;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'MenuItem';
        $items = MenuItem::with('itemcategories')->get();
        // return $items;
        return view('merchant.menuitem.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $item_categories = ItemCategory::where('shop_id', Auth::user()->shop_id)->get();
        // return $item_categories;
        $dietaries = Dietary::all();
        return view('merchant.menuitem.create', compact('item_categories', 'categories', 'dietaries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuItemRequest $request, MenuItemService $service, int $id = null)
    {
        // return Auth::user()->shop_id;
        $data['user_id'] = Auth::user()->id;
        $data['shop_id'] = Auth::user()->shop_id;
        if (!empty($request->thumbnail) && $request->thumbnail instanceof UploadedFile) {
            $data['thumbnail'] = is_null($id) ? FileUploadHelper::store($request->thumbnail, 'menus') : FileUploadHelper::store($request->thumbnail, 'menus', $service->findById($id)->thumbnail);
        } else {
            $data['thumbnail'] = is_null($id) ? null : $service->findById($id)->thumbnail;
        }

        if (is_null($id)) {
           
            
            $menu_item = $service->create(MenuItemDTO::new(array_merge($data, $request->safe()->except(['_token']))));
            $menu_item->itemcategories()->sync($request->item_category);
            flash('Menu Added Successfully!')->success();
        } else {
            $menu_item = $service->update($id, MenuItemDTO::new(array_merge($data, $request->safe()->except(['_token']))));
            $menu_item->itemcategories()->sync($request->item_category);
            flash('Menu Updated Successfully!')->success();
        }

        return redirect()->route('merchant.menuitem.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'MenuItem';
        $item = MenuItem::findOrFail(intval($id));
        $categories = Category::all();
        $item_categories = ItemCategory::where('shop_id', Auth::user()->shop_id)->get();
        $dietaries = Dietary::all();
        return view('merchant.menuitem.create', compact('title', 'item', 'item_categories', 'categories', 'dietaries'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, MenuItemService $service)
    {
        if ($service->deleteById($id)) {
            flash('Menu Deleted Successfully!')->success();
        } else {
            flash()->error("Menu delete failed!");
        }
        return redirect()->route('merchant.menuitem.index');
    }

    public function extraStore(Request $request)
    {
        if (!empty($request->image) && $request->image instanceof UploadedFile) {
            $image = FileUploadHelper::store($request->image, 'extras');
        }

        $item = Extra::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $image ?? '',
        ]);
        flash('Extra Item Added Successfully!')->success();

        return response()->json(['id' => $item->id, 'name' => $item->name]);
    }
}
