@props(['label', 'name' => '', 'options' => [], 'value' => '', 'required' => false])
<div class="field">
    <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label }}</label>
    <div class="control">
        <div {{ $attributes->class(['select', 'is-danger' => $errors->has($name)])->only(['class']) }}>
            <select name="{{ $name }}"
                    id="{{ \Illuminate\Support\Str::camel($name) }}"
                    {!! $attributes->getFirstLike('wire:model') !!}
                    @if($required) required @endif
            >
                @if($attributes->has('placeholder'))
                    <option value="" hidden>{{ $attributes->get('placeholder') }}</option>
                @endif
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
