@props(['label', 'name' => '', 'value' => '', 'required' => false])
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <textarea id="{{ \Illuminate\Support\Str::camel($name) }}" name="{{ $name }}"
                    class="textarea @if($errors->has($name)) is-danger @endif"
                    @if($attributes->has('wire:model')) wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}" @endif
                    @if($required) required @endif
                >{{ old($name, $value) }}</textarea>
                <x-bbui::error name="{{ $name }}"></x-bbui::error>
            </div>
        </div>
    </div>
</div>
