@props(['label', 'name' => '', 'options' => [], 'value' => '', 'required' => false])
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                <div class="select is-fullwidth">
                    <select name="{{ $name }}" id="{{ \Illuminate\Support\Str::camel($name) }}"
                            class="@if($errors->has($name)) is-danger @endif"
                            @if($attributes->has('wire:model')) wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}" @endif
                            @if($required) required @endif
                    >
                        @foreach($options as $key => $option)
                            <option value="{{ $key }}" @if($key == $value) selected @endif>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <x-bbui::error name="{{ $name }}"></x-bbui::error>
            </div>
        </div>
    </div>
</div>
