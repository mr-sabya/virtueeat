@extends('layouts.admin')
@section('content')
    <a href="{{ url()->previous() }}">
        <div class="come_to_back_btn"><span class="icon-Path-1777"></span>Back</div>
    </a>
    <div class="add_food_iten_box">
        <h2>{{ ucfirst($page) }} Settings</h2>
        <form id="uploadForm"
            action="{{ isset($item) ? route('admin.page.store', [$page, $item->id]) : route('admin.page.store', $page) }}"
            method="post" enctype="multipart/form-data">
            @csrf

            @if ($page == App\Enums\PageType::VEHICLE->value)
                <x-admin.select title="name" :data="$countries" :value="isset($item) ? $item->country_id : ''" />
                @error('name')
                    <x-admin.input-error :message="$message" />
                @enderror

                <div class="store_hours_table">
                    <h4 class="text-center mb-5 fw-bold">Required Documents</h4>
                    <table id="docTable" class="w-100">
                        <tbody>
                            <tr>
                                <td>Document Name</td>
                                <td class="w-25">
                                    <button onclick="$('#docTable').append($('tr[class=docTr]:last').clone())"
                                        type="button"
                                        class="btn btn-primary flex justify-content-center align-items-center">Add <i
                                            class="flaticon-plus"></i></button>
                                </td>
                            </tr>
                            <tr class="docTr">
                                <td><x-admin.input class="mb-0 text-center border rounded-pill" type="text"
                                        title="content[]" placeholder="Type Documents Name" :value="isset($item) ? $item->content : ''" /></td>
                                <td class="w-25">
                                    <button type="button"
                                        onclick="$(this).closest('tr').is(':last-child') ? '':this.closest('tr').remove()"
                                        class="btn btn-danger"><i class="flaticon-trash-can"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @else
                <x-admin.input type="text" title="name" placeholder="Name" :value="isset($item) ? $item->name : ''" />
                @error('name')
                    <x-admin.input-error :message="$message" />
                @enderror

                <div class="form-group">
                    <textarea name="content" id="editor">{{ isset($item) ? $item->content : '' }}</textarea>
                </div>
                @error('content')
                    <x-admin.input-error :message="$message" />
                @enderror
            @endif

            <button type="submit">{{ isset($item) ? 'Update' : 'Submit' }}</button>
        </form>
    </div>
@endsection
@if ($page != App\Enums\PageType::VEHICLE->value)
    @push('scripts')
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
@endif
