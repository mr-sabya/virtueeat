<?php

namespace App\Http\Controllers\Admin\Shop2;

use App\DTOs\shop2\Shop2ProductImageDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop2\Shop2ProductImageRequest;
use App\Models\Shop2Product;
use App\Models\Shop2ProductImage;
use App\Services\Shop2\Shop2ProductImageService;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $title = 'Product Image';
        $product = Shop2Product::findOrFail(intval($id));
        return view('backend.shop2.productimage.index', compact('title', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $title = 'Add Product Image';
        $product = Shop2Product::findOrFail(intval($id));
        return view('backend.shop2.productimage.create', compact('title', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Shop2ProductImageRequest $request, Shop2ProductImageService $service, int $id = null)
    {
        // return $request;
        $data = $request->safe()->except(['_token']);

        if (!empty($request->image) && $request->image instanceof UploadedFile) {
            $data['image'] = is_null($id) ? FileUploadHelper::store($request->image, 'products') : FileUploadHelper::store($request->image, 'products', $service->findById($id)->image);
        } else {
            $data['image'] = is_null($id) ? null : $service->findById($id)->image;
        }

        if (is_null($id)) {
            $service->create(Shop2ProductImageDTO::new($data));
            flash('Product Added Successfully!')->success();
        } else {
            $service->update($id, Shop2ProductImageDTO::new($data));
            flash('Product Updated Successfully!')->success();
        }

        return redirect()->route('admin.productimage.index', $request->product_id);
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
        $title = 'Edit Product Image';
        $item = Shop2ProductImage::findOrFail(intval($id));
        return view('backend.shop2.productimage.create', compact('title', 'item'));
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
