<?php

namespace App\Http\Controllers\Rider;

use App\DTOs\VehicleDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rider\VehicleRequest;
use App\Models\Page;
use App\Models\Vehicle;
use App\Services\CountryService;
use App\Services\VehicleService;
use App\Utilities\FileUploadHelper;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rider.vehicle.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(CountryService $country)
    {
        $title = 'vehicle';
        // $docs = Page::where('name', 'Bangladesh')->first()->content;
        // $files = json_decode($docs);
        $countries = $country->all();
        return view('rider.vehicle.create', compact('title', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request, VehicleService $service, int $id = null)
    {
        $data = $request->safe()->except(['_token']);
        if (!empty($request->documents) || $request->documents instanceof UploadedFile) {
            $data['documents'] = is_null($id) ? FileUploadHelper::store($request->documents, 'vehicle/documents') : FileUploadHelper::store($request->documents, 'vehicle/documents', $service->findById($id)->documents);
        } else {
            $data['documents'] = is_null($id) ? null : $service->findById($id)->documents;
        }
        // dd($data);

        if (is_null($id)) {
            $service->create(VehicleDTO::new(array_merge(['user_id' => Auth::user()->id], $data)));
            flash('Vehicle Added Successfully!')->success();
        } else {
            $service->update($id, VehicleDTO::new(array_merge(['user_id' => Auth::user()->id], $request->safe()->except(['_token']))));
            flash('Vehicle Updated Successfully!')->success();
        }

        return redirect()->route('rider.vehicle.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Vehicle';
        $item = Vehicle::findOrFail(intval($id));
        return view('rider.vehicle.create', compact('title', 'item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, VehicleService $service)
    {
        if ($service->deleteById($id)) {
            flash('Vehicle Deleted Successfully!')->success();
        } else {
            flash()->error("Vehicle delete failed!");
        }
        return redirect()->route('rider.vehicle.index');
    }
}
