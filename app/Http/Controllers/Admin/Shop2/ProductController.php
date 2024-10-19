<?php

namespace App\Http\Controllers\Admin\Shop2;

use App\DTOs\shop2\Shop2ProductDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shop2\Shop2ProductRequest;
use App\Models\Shop2Category;
use App\Models\Shop2Product;
use App\Models\Shop2ProductColor;
use App\Services\Shop2\Shop2ProductService;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Product';
        if ($request->ajax()) {
            $items = Shop2Product::orderBy('id', 'DESC')->get();

            return DataTables::of($items)
                ->addColumn('productimage', function ($item) {
                    $url = getFileUrl($item->image);
                    return '<img style="width: 80px" src="' . $url . '"/>';
                })

                ->addColumn('productcolors', function ($item) {
                    if($item->colors->count()>0){
                        $data = '<div class="d-flex gap-2">';

                        foreach($item->colors as $color){
                            $data .= '<div class="color" style="background: '.$color->color_code.'"></div>';
                        }
                        $data .= '</div>';

                        return $data;
                    }else{
                        return 'No Color';
                    }
                })
                ->addColumn('action', function ($item) {
                    $actionBtn = '<div class="d-flex gap-2">';
                    $actionBtn .= '<a href="'.route('admin.product.edit', $item->id).'" class="edit btn_box"> <i class="fa-solid fa-pen"></i> </a>';
                    $actionBtn .= '<a href="javascript:void(0)" class="delete btn_box"><i class="fa-solid fa-trash-can"></i> </a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })
                ->addColumn('addimage', function ($item) {
                    $actionBtn = '<div class="d-flex gap-2">';
                    $actionBtn .= '<a href="'.route('admin.productimage.index', $item->id).'" class="edit btn_box"> <i class="fa-solid fa-plus"></i> </a>';
                    $actionBtn .= '</div>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'productimage', 'productcolors', 'addimage'])
                ->addIndexColumn()
                ->make(true);
        }
        // return $items;
        return view('backend.shop2.product.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add New Product';
        $colors = Shop2ProductColor::all();
        $categories = Shop2Category::all();
        return view('backend.shop2.product.create', compact('title', 'colors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Shop2ProductRequest $request, Shop2ProductService $service, int $id = null)
    {
        // return $request;
        $data = $request->safe()->except(['_token']);

        if (!empty($request->image) && $request->image instanceof UploadedFile) {
            $data['image'] = is_null($id) ? FileUploadHelper::store($request->image, 'products') : FileUploadHelper::store($request->image, 'products', $service->findById($id)->image);
        } else {
            $data['image'] = is_null($id) ? null : $service->findById($id)->image;
        }

        if (is_null($id)) {
            $product = $service->create(Shop2ProductDTO::new($data));
            $product->colors()->sync($request->colors);
            flash('Product Added Successfully!')->success();
        } else {
            $product = $service->update($id, Shop2ProductDTO::new($data));
            $product->colors()->sync($request->colors);
            flash('Product Updated Successfully!')->success();
        }

        return redirect()->route('admin.product.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Product';
        $item = Shop2Product::findOrFail(intval($id));
        $colors = Shop2ProductColor::all();
        $categories = Shop2Category::all();
        return view('backend.shop2.product.create', compact('title', 'item', 'colors', 'categories'));
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
