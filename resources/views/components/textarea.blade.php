@props(['label', 'name' => '', 'value' => ''])
<div class="field">
    <label class="label" for="">{{ $label }}</label>
    <div class="control">
        <textarea id="" name="{{ $name }}"
                  @isset($type) type="{{ $type }}" @else type="text" @endisset
                  class="textarea @if($errors->has($name)) is-danger @endif"
                  @if($attributes->has('wire:model')) wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}" @endif
        >{{ old($name, $value) }}</textarea>
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
