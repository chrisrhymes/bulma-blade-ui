@props(['label', 'name' => '', 'value' => ''])
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <textarea id="" name="{{ $name }}"
                    class="textarea @if($errors->has($name)) is-danger @endif"
                    @if($attributes->has('wire:model')) wire:model="{{ $attributes->whereStartsWith('wire:model')->first }}" @endif
                >{{ old($name, $value) }}</textarea>
                <x-bbui::error name="{{ $name }}"></x-bbui::error>
            </div>
        </div>
    </div>
</div>
