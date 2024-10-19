<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\DietaryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DietaryRequest;
use App\Models\Dietary;
use App\Services\DietaryService;


class DietaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DietaryService $service)
    {
        $title = 'Dietary';
        $items = $service->all();
        return view('backend.dietary.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Dietary';
        return view('backend.dietary.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DietaryRequest $request, DietaryService $service, int $id = null)
    {
        if (is_null($id)) {
            $service->create(DietaryDTO::new($request->safe()->except(['_token'])));
            flash('Dietry Added Successfully!')->success();
        }else {
            $service->update($id, DietaryDTO::new($request->safe()->except(['_token'])));
            flash('Dietry Updated Successfully!')->success();
        }

        return redirect()->route('admin.dietary.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Dietry';
        $item = Dietary::findOrFail(intval($id));
        return view('backend.dietary.create', compact('title', 'item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, DietaryService $service)
    {
        if($service->deleteById($id)) {
            flash('Dietry Deleted Successfully!')->success();
        } else {
            flash()->error("Dietry delete failed!");
        }
        return redirect()->route('admin.dietary.index');
    }
}
