@props(['label', 'name' => '', 'value' => '', 'required' => false])
<div class="field">
    <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label }}</label>
    <div class="control">
        <textarea id="{{ \Illuminate\Support\Str::camel($name) }}"
                  name="{{ $name }}"
                  @isset($type) type="{{ $type }}" @else type="text" @endisset
                  class="textarea @if($errors->has($name)) is-danger @endif"
                  @if($attributes->has('wire:model')) wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}" @endif
                  @if($required) required @endif
        >{{ old($name, $value) }}</textarea>
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
