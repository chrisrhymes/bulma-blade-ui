@props(['label', 'name' => '', 'options' => [], 'value' => '', 'required' => false])
<div class="field">
    <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label }}</label>
    <div class="control">
        @foreach($options as $key => $option)
            <div class="field">
                <label class="radio">
                    <input type="radio"
                           id="{{ \Illuminate\Support\Str::camel($name) }}"
                           name="{{ $name }}"
                           value="{{ $key }}"
                           class="@if($errors->has($name)) is-danger @endif"
                           @if($attributes->has('wire:model')) wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}" @endif
                           @if($required) required @endif
                           @if($key === $value) checked @endif
                    />
                    {{ $option }}
                </label>
            </div>
        @endforeach
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
