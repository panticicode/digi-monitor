<div class="col-md-3 showcase_text_area">
    <label for="inputType14">Template</label>
</div>
<div class="col-md-6 showcase_content_area selectTemplate">
    <select name="template_id" id="" class="form-control {{ count($templates) ? '' : 'is-invalid' }}">
        @foreach($templates as $template)
        <option value="{{ $template->id }}">{{ $template->name }}</option>
        @endforeach
    </select>
    @if(!count($templates))
    <div class="invalid-feedback">
        You don't have teample
    </div>
    @endif
</div>