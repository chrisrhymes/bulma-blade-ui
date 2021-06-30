@props(['label', 'name' => '', 'value' => '', 'type' => 'text', 'required' => false, 'readonly' => false])
<div class="field">
    <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label}}</label>
    <div class="control">
        <input id="{{ \Illuminate\Support\Str::camel($name) }}" name="{{ $name }}"
                type="{{ $type }}"
                {{ $attributes->class(['input', 'is-danger' => $errors->has($name)]) }}
                value="{{ old($name, $value) }}"
                @if($attributes->has('wire:model'))
                    wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}"
                @endif
                @if($required) required @endif
                @if($readonly) readonly @endif
                @if($attributes->has('placeholder')) placeholder="{{ $attributes->get('placeholder') }}" @endif
        />
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
