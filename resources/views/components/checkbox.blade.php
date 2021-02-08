@props(['label', 'name' => '', 'value' => '', 'required' => false])
<label class="checkbox">
  <input type="checkbox" name="{{ $name }}" @if($required) required @endif value="{{ $value }}">
  {{ $label }}
</label>
<x-bbui::error name="{{ $name }}"></x-bbui::error>
