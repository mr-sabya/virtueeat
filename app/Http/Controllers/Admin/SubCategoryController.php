<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\SubCategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\SubCategoryService;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'SubCategory';
        $items = SubCategory::orderBy('id', 'DESC')->get();
        return view('backend.subcategory.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Sub Category';
        $categories = Category::all();
        return view('backend.subcategory.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request, SubCategoryService $service, int $id = null)
    {
        // return $request;
        $data = $request->safe()->except(['_token']);

        if( ! empty($request->thumbnail) && $request->thumbnail instanceof UploadedFile) {
            $data['thumbnail'] = is_null($id) ? FileUploadHelper::store($request->thumbnail, 'categories'):FileUploadHelper::store($request->thumbnail, 'categories', $service->findById($id)->thumbnail);
        }else {
            $data['thumbnail'] = is_null($id) ? null:$service->findById($id)->thumbnail;
        }

        if (is_null($id)) {
            $service->create(SubCategoryDTO::new($data));
            flash('Category Added Successfully!')->success();
        } else {
            $service->update($id, SubCategoryDTO::new($data));
            flash('Category Updated Successfully!')->success();
        }

        return redirect()->route('admin.subcategory.index');
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
        $title = 'Category';
        $item = SubCategory::findOrFail(intval($id));
        $categories = Category::all();
        return view('backend.subcategory.create', compact('title', 'item', 'categories'));
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
    public function destroy(string $id, SubCategoryService $service)
    {
        if ($service->deleteById($id)) {
            flash('Category Deleted Successfully!')->success();
        } else {
            flash()->error("Category delete failed!");
        }
        return redirect()->route('admin.subcategory.index');
    }
}
