<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\CategoryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Category';
        $items = Category::orderBy('id', 'DESC')->get();
        return view('backend.category.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Category';
        return view('backend.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request, CategoryService $service, int $id = null)
    {
        $data = $request->safe()->except(['_token']);

        if( ! empty($request->thumbnail) && $request->thumbnail instanceof UploadedFile) {
            $data['thumbnail'] = is_null($id) ? FileUploadHelper::store($request->thumbnail, 'categories'):FileUploadHelper::store($request->thumbnail, 'categories', $service->findById($id)->thumbnail);
        }else {
            $data['thumbnail'] = is_null($id) ? null:$service->findById($id)->thumbnail;
        }

        if (is_null($id)) {
            $service->create(CategoryDTO::new($data));
            flash('Category Added Successfully!')->success();
        } else {
            $service->update($id, CategoryDTO::new($data));
            flash('Category Updated Successfully!')->success();
        }

        return redirect()->route('admin.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Category';
        $item = Category::findOrFail(intval($id));
        return view('backend.category.create', compact('title', 'item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, CategoryService $service)
    {
        if ($service->deleteById($id)) {
            flash('Category Deleted Successfully!')->success();
        } else {
            flash()->error("Category delete failed!");
        }
        return redirect()->route('admin.category.index');
    }
}
