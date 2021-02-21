@props(['label', 'name' => '', 'value' => '', 'type' => 'text', 'required' => false])
<div class="field">
    <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label}}</label>
    <div class="control">
        <input id="{{ \Illuminate\Support\Str::camel($name) }}" name="{{ $name }}"
                type="{{ $type }}"
                class="input @error($name) is-danger @enderror"
                value="{{ old($name, $value) }}"
                @if($attributes->has('wire:model'))
                    wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}"
                @endif
                @if($required) required @endif
        />
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
