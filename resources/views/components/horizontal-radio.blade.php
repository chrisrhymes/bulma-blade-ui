@props(['label', 'name' => '', 'value' => '', 'type' => 'text', 'required' => false, 'options' => []])
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label" for="">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                @foreach($options as $key => $option)
                    <div class="field">
                        <label class="radio">
                            <input type="radio"
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
    </div>
</div>
