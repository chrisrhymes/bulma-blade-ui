@props(['label', 'name' => '', 'value' => ''])
<label class="checkbox">
  <input type="checkbox" name="{{ $name }}">
  {{ $label }}
</label>
