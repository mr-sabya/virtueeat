<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\DietryDTO;
use App\Enums\PageType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DietryRequest;
use App\Models\Dietry;
use App\Models\Page;
use App\Services\CountryService;
use App\Services\DietryService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($page, DietryService $service, CountryService $countryService)
    {
        $item = Page::where('page_type', $page)->first();
        $countries = $countryService->all();

        if ($item) {
            if ($page == PageType::VEHICLE->value) {
                return view('backend.pages.create', compact('page', 'countries', 'item'));
            }
            return view('backend.pages.create', compact('page', 'item'));
        }

        if (!$item && $page == PageType::VEHICLE->value) {
            return view('backend.pages.create', compact('page', 'countries'));
        }

        return view('backend.pages.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DietryService $service, $page, int $id = null)
    {
        // dd($request->all());
        if (is_null($id)) {
            Page::create([
                'page_type' => $page,
                'name' => $request->name,
                'content' => $page == PageType::VEHICLE->value ? json_encode($request->content):$request->content
            ]);
            flash('Page Content Added Successfully!')->success();
        } else {
            $service->update($id, DietryDTO::new($request->safe()->except(['_token'])));
            flash('Page Content Updated Successfully!')->success();
        }

        return redirect()->route('admin.page.index', $page);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Dietry';
        $item = Dietry::findOrFail(intval($id));
        return view('backend.dietry.create', compact('title', 'item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, DietryService $service)
    {
        if ($service->deleteById($id)) {
            flash('Dietry Deleted Successfully!')->success();
        } else {
            flash()->error("Dietry delete failed!");
        }
        return redirect()->route('admin.dietry.index');
    }
}
