@props(['label', 'name' => '', 'value' => '', 'type' => 'text', 'required' => false, 'options' => []])
<div class="field is-horizontal">
    <div class="field-label is-normal">
        <label class="label">{{ $label}}</label>
    </div>
    <div class="field-body">
        <div class="field">
            <div class="control is-expanded">
                @foreach($options as $key => $option)
                    <div class="field">
                        <x-bbui::checkbox :label="$option" :name="$name" :value="$key" :required="$required" 
                            wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}" 
                        ></x-bbui::checkbox>
                    </div>
                @endforeach
                <x-bbui::error name="{{ $name }}"></x-bbui::error>
            </div>
        </div>
    </div>
</div>
