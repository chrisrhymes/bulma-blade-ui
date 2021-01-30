@php($value = $value ?? '')
<div class="field">
    <label class="label" for="">{{ $label}}</label>
    <div class="control">
        <textarea id="" name="{{ $name }}" 
            @isset($type) type="{{ $type }}" @else type="text" @endif 
            class="textarea"
        >{{ old($name, $value) }}</textarea>
    </div>
</div>