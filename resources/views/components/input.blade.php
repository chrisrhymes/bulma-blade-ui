@props(['label', 'name' => '', 'value' => ''])
<div class="field">
    <label class="label" for="">{{ $label}}</label>
    <div class="control">
        <input id="" name="{{ $name }}"
            @isset($type) type="{{ $type }}" @else type="text" @endif
            class="input @if($errors->has($name)) is-danger @endif"
            value="{{ old($name, $value) }}"
           @if($attributes->has('wire:model'))
                wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}"
           @endif
        />
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
