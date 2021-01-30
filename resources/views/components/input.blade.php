@php($value = $value ?? '')
<div class="field">
    <label class="label" for="">{{ $label}}</label>
    <div class="control">
        <input id="" name="{{ $name }}" 
            @isset($type) type="{{ $type }}" @else type="text" @endif 
            class="input" 
            value="{{ old($name, $value) }}"
        />
    </div>
</div>