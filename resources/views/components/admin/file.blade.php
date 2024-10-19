<div class="form-group image_upload_box">
    <h6>Upload Image</h6>
    <label for="image-upload" class="custom-file-upload">
        @if($value)
        <img src="{{ $value }}" alt="upload" id="output">
        @else
        <img src="{{ url('assets/backend/images/icons/icon_19.png') }}" alt="upload" id="output">
        @endif
    </label>
    <input type="file" id="image-upload" name="{{ $title }}" onchange="loadFile(event)">
</div>
