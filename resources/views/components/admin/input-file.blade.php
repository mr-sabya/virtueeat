<div class="form-group">
    <label for="{{ $title }}">{{ $title }}</label>
    <i class="flaticon-download"></i>
    <input type="file" id="{{ $title }}" name="{{ $name ?? $title }}" accept=".pdf,.doc,.docx.jpg,.png" required>
</div>
