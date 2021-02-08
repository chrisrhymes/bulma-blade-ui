@props(['label', 'name' => '', 'options' => [], 'value' => '', 'required' => false])
<div class="field">
    <label class="label">{{ $label }}</label>
    <div class="control">
        <div class="select is-fullwidth">
            <select name="{{ $name }}"
                    class="@if($errors->has($name)) is-danger @endif"
                    @if($attributes->has('wire:model')) wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}" @endif
                    @if($required) required @endif
            >
                @foreach($options as $key => $option)
                    <option value="{{ $key }}" @if($key === $value) selected @endif>
                        {{ $option }}
                    </option>
                @endforeach
            </select>
        </div>
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
