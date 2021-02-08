@props(['label', 'name' => '', 'value' => '', 'type' => 'text', 'required' => false, 'options' => []])
<div class="field">
    <label class="label" for="">{{ $label}}</label>
    <div class="control">
        @foreach($options as $key => $option)
            <div class="field">
                <x-bbui::checkbox :label="$option" :name="$name" :value="$key" :required="$required"></x-bbui::checkbox>
            </div>
        @endforeach
        <x-bbui::error name="{{ $name }}"></x-bbui::error>
    </div>
</div>
