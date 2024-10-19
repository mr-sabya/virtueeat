@if(isset($label))
<label for="">{{ $label }}</label>
@endif
<div class="form-group {{ $class ?? 'mb-3' }}">
    <input class="{{ $class ?? '' }}" type="{{ $type }}" id="{{ $title }}" name="{{ $title }}" placeholder="{{ $placeholder ?? '' }}" value="{{ $value ?? '' }}">
</div>