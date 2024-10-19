@extends('merchant.layouts.app')
@section('content')
    <a href="{{ url()->previous() }}">
        <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
    </a>
    <div class="add_food_iten_box">
        <h2>Add {{ __('Schedule') }}</h2>
        <form id="uploadForm" action="{{ isset($item) ? route('merchant.schedule.store', $item->id):route('merchant.schedule.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="store_hours_table">
                <table>
                    <tbody>
                        <tr>
                            <td>DAY</td>
                            <td>From</td>
                            <td>To</td>
                        </tr>
                        <tr>
                            <td>Sunday</td>
                            <td><x-admin.input class="mb-0 text-center" type="time" title="sunday[from]"  :value="isset($item) ? $item->sunday['from'] : ''" /></td>
                            <td><x-admin.input class="mb-0 text-center" type="time" title="sunday[to]"  :value="isset($item) ? $item->sunday['to'] : ''" /></td>
                        </tr>
                        <tr>
                            <td>Monday</td>
                            <td><x-admin.input class="mb-0 text-center" type="time" title="monday[from]"  :value="isset($item) ? $item->monday['from'] : ''" /></td>
                                <td><x-admin.input class="mb-0 text-center" type="time" title="monday[to]"  :value="isset($item) ? $item->monday['to'] : ''" /></td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td><x-admin.input class="mb-0 text-center" type="time" title="tuesday[from]"  :value="isset($item) ? $item->tuesday['from'] : ''" /></td>
                                <td><x-admin.input class="mb-0 text-center" type="time" title="tuesday[to]"  :value="isset($item) ? $item->tuesday['to'] : ''" /></td>
                        </tr>
                        <tr>
                            <td>Wednesday</td>
                            <td><x-admin.input class="mb-0 text-center" type="time" title="wednesday[from]"  :value="isset($item) ? $item->wednesday['from'] : ''" /></td>
                                <td><x-admin.input class="mb-0 text-center" type="time" title="wednesday[to]"  :value="isset($item) ? $item->wednesday['to'] : ''" /></td>
                        </tr>
                        <tr>
                            <td>Thursday</td>
                            <td><x-admin.input class="mb-0 text-center" type="time" title="thursday[from]"  :value="isset($item) ? $item->thursday['from'] : ''" /></td>
                                <td><x-admin.input class="mb-0 text-center" type="time" title="thursday[to]"  :value="isset($item) ? $item->thursday['to'] : ''" /></td>
                        </tr>
                        <tr>
                            <td>Friday</td>
                            <td><x-admin.input class="mb-0 text-center" type="time" title="friday[from]"  :value="isset($item) ? $item->friday['from'] : ''" /></td>
                                <td><x-admin.input class="mb-0 text-center" type="time" title="friday[to]"  :value="isset($item) ? $item->friday['to'] : ''" /></td>
                        </tr>
                        <tr>
                            <td>Saturday</td>
                            <td><x-admin.input class="mb-0 text-center" type="time" title="saturday[from]"  :value="isset($item) ? $item->saturday['from'] : ''" /></td>
                                <td><x-admin.input class="mb-0 text-center" type="time" title="saturday[to]"  :value="isset($item) ? $item->saturday['to'] : ''" /></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
