@props(['label', 'name' => '', 'value' => '', 'required' => false])
<label class="checkbox">
  <input type="checkbox" name="{{ $name }}" 
      @if($required) required @endif 
      @if($attributes->has('wire:model'))
          wire:model="{{ $attributes->whereStartsWith('wire:model')->first() }}"
      @endif
      value="{{ $value }}">
  {{ $label }}
</label>
<x-bbui::error name="{{ $name }}"></x-bbui::error>
