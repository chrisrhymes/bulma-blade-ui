@props(['label', 'name' => '', 'value' => '', 'type' => 'text', 'required' => false, 'readonly' => false])
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
                    {{ $attributes->class(['input', 'is-danger' => $errors->has($name)])->only(['class', 'placeholder']) }}
                    value="{{ old($name, $value) }}"
                   {!! $attributes->getFirstLike('wire:model') !!}
                    @if($required) required @endif
                    @if($readonly) readonly @endif
                />
                <x-bbui::error name="{{ $name }}"></x-bbui::error>
            </div>
        </div>
    </div>
</div>
