<?php

namespace App\Http\Controllers\Admin\Shop2;

use App\DTOs\shop2\Shop2ProductColorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop2\Shop2ProductColorRequest;
use App\Models\Shop2ProductColor;
use App\Services\Shop2\Shop2ProductColorService;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Product Color';
        $items = Shop2ProductColor::orderBy('id', 'DESC')->get();
        return view('backend.shop2.color.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add New Product Color';
        return view('backend.shop2.color.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Shop2ProductColorRequest $request, Shop2ProductColorService $service, int $id = null)
    {
        $data = $request->safe()->except(['_token']);
        
        if (is_null($id)) {
            $service->create(Shop2ProductColorDTO::new($data));
            flash('Color Code Added Successfully!')->success();
        } else {
            $service->update($id, Shop2ProductColorDTO::new($data));
            flash('Color Code Updated Successfully!')->success();
        }

        return redirect()->route('admin.productcolor.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Product Color';
        $item = Shop2ProductColor::findOrFail(intval($id));
        return view('backend.shop2.color.create', compact('title', 'item'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Shop2ProductColorService $service)
    {
        if ($service->deleteById($id)) {
            flash('Color Code Deleted Successfully!')->success();
        } else {
            flash()->error("Color Code delete failed!");
        }
        return redirect()->route('admin.productcolor.index');
    }
}
