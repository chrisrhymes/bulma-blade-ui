@props(['label', 'name' => '', 'value' => '', 'required' => false, 'readonly' => false])
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <textarea id="{{ \Illuminate\Support\Str::camel($name) }}" name="{{ $name }}"
                    {{ $attributes->class(['textarea', 'is-danger' => $errors->has($name)])->only(['class', 'placeholder']) }}
                    {!! $attributes->getFirstLike('wire:model') !!}
                    @if($required) required @endif
                    @if($readonly) readonly @endif
                >{{ old($name, $value) }}</textarea>
                <x-bbui::error name="{{ $name }}"></x-bbui::error>
            </div>
        </div>
    </div>
</div>
