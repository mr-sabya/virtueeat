<?php

namespace App\Http\Controllers\Admin;

use App\DTOs\CityDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CityRequest;
use App\Models\Country;
use App\Models\City;
use App\Services\CityService;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CityService $service)
    {
        $title = 'City';
        $items = City::paginate(12);
        return view('backend.city.index', compact('title', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'City';
        $countries = Country::all();
        return view('backend.city.create', compact('title', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request, CityService $service, int $id = null)
    {
        if (is_null($id)) {
            $service->create(CityDTO::new($request->safe()->except(['_token'])));
            flash('City Added Successfully!')->success();
        }else {
            $service->update($id, CityDTO::new($request->safe()->except(['_token'])));
            flash('City Updated Successfully!')->success();
        }

        return redirect()->route('admin.city.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'City';
        $item = City::findOrFail(intval($id));
        $countries = Country::all();
        return view('backend.city.create', compact('title', 'item', 'countries'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, CityService $service)
    {
        if($service->deleteById($id)) {
            flash('City Deleted Successfully!')->success();
        } else {
            flash()->error("City delete failed!");
        }
        return redirect()->route('admin.city.index');
    }
}
