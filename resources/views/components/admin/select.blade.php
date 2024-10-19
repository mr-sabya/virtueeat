@if(isset($label))
<label for="">{{ $label }}</label>
@endif
<div class="form-group">
    <div class="form-switcher select-box mb-3">
        <select class="wide" id="{{ $title }}" name="{{ $title }}">
            <option value="" selected disabled>-- Select --</option>
            @foreach ($data as $item)
                <option value="{{ $title == 'name' ? $item->name : $item->id }}"
                    {{ $item->id == $value ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </select>
    </div>
</div>
