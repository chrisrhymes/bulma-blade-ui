@props(['label', 'name' => '', 'value' => '', 'type' => 'text', 'required' => false, 'options' => []])
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="{{ \Illuminate\Support\Str::camel($name) }}">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                @foreach($options as $key => $option)
                    <div class="field">
                        <label class="radio">
                            <input type="radio"
                                   id="{{ \Illuminate\Support\Str::camel($name) }}"
                                   name="{{ $name }}"
                                   value="{{ $key }}"
                                   class="@if($errors->has($name)) is-danger @endif"
                                   {!! $attributes->getFirstLike('wire:model') !!}
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
    </div>
</div>
