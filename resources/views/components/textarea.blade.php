@props(['label', 'name' => '', 'value' => '', 'required' => false, 'readonly' => false])
<div class="field">
    <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label }}</label>
    <div class="control">
        <textarea id="{{ \Illuminate\Support\Str::camel($name) }}"
                  name="{{ $name }}"
                  @isset($type) type="{{ $type }}" @else type="text" @endisset
                  {{ $attributes->class(['textarea', 'is-danger' => $errors->has($name)])->only(['class', 'placeholder']) }}
                  {!! $attributes->getFirstLike('wire:model') !!}
                  @if($required) required @endif
                  @if($readonly) readonly @endif
        >{{ old($name, $value) }}</textarea>
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
