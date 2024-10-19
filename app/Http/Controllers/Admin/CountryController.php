<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\CountryDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryRequest;
use App\Models\Country;
use App\Services\CountryService;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CountryService $service)
    {
        $title = 'Country';
        $items = $service->all();
        return view('backend.country.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Country';
        return view('backend.country.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request, CountryService $service, int $id = null)
    {
        if (is_null($id)) {
            $service->create(CountryDTO::new($request->safe()->except(['_token'])));
            flash('Country Added Successfully!')->success();
        }else {
            $service->update($id, CountryDTO::new($request->safe()->except(['_token'])));
            flash('Country Updated Successfully!')->success();
        }

        return redirect()->route('admin.country.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Country';
        $item = Country::findOrFail(intval($id));
        return view('backend.country.create', compact('title', 'item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, CountryService $service)
    {
        if($service->deleteById($id)) {
            flash('Country Deleted Successfully!')->success();
        } else {
            flash()->error("Country delete failed!");
        }
        return redirect()->route('admin.country.index');
    }
}
