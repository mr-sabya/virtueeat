<?php

namespace App\Http\Controllers\Merchant;

use App\DTOs\ScheduleDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Merchant\ScheduleRequest;
use App\Models\Schedule;
use App\Services\ScheduleService;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ScheduleService $service)
    {
        if (is_null($service->all())) {
            return view('merchant.schedule.create');
        }
        return view('merchant.schedule.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ScheduleRequest $request, ScheduleService $service, int $id = null)
    {
        if (is_null($id)) {
            $service->create(ScheduleDTO::new(array_merge(['user_id' => Auth::user()->id], $request->safe()->except(['_token']))));
            flash('Schedule Added Successfully!')->success();
        }else {
            $service->update($id, ScheduleDTO::new(array_merge(['user_id' => Auth::user()->id], $request->safe()->except(['_token']))));
            flash('Schedule Updated Successfully!')->success();
        }

        return redirect()->route('merchant.schedule.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Schedule';
        $item = Schedule::findOrFail(intval($id));
        return view('frontend.merchant.schedule.create', compact('title', 'item'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, ScheduleService $service)
    {
        if($service->deleteById($id)) {
            flash('Schedule Deleted Successfully!')->success();
        } else {
            flash()->error("Schedule delete failed!");
        }
        return redirect()->route('merchant.schedule.index');
    }
}
