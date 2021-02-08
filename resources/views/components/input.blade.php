@props(['label', 'name' => '', 'value' => '', 'type' => 'text'])
<div class="field">
    <label class="label" for="">{{ $label}}</label>
    <div class="control">
        <input id="" name="{{ $name }}"
               type="{{ $type }}"
               class="input @error($name) is-danger @enderror"
               value="{{ old($name, $value) }}"
               @if($attributes->has('wire:model'))
                    wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}"
               @endif
        />
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
