@php($value = $value ?? '')
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <textarea id="" name="{{ $name }}" 
                    class="textarea" 
                >{{ old($name, $value) }}</textarea>
            </div>
        </div>
    </div>
</div>