@props(['label', 'name' => '', 'value' => '', 'type' => 'text', 'required' => false])
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <input id="{{ \Illuminate\Support\Str::camel($name) }}"
                    name="{{ $name }}"
                    type="{{ $type }}"
                    class="input @if($errors->has($name)) is-danger @endif"
                    value="{{ old($name, $value) }}"
                    @if($attributes->has('wire:model'))
                       wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}"
                    @endif
                    @if($required) required @endif
                />
                <x-bbui::error name="{{ $name }}"></x-bbui::error>
            </div>
        </div>
    </div>
</div>
