@php($value = $value ?? '')
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <input id="" name="{{ $name }}" 
                    @isset($type) type="{{ $type }}" @else type="text" @endif 
                    class="input" 
                    value="{{ old($name, $value) }}"
                />
            </div>
        </div>
    </div>
</div>