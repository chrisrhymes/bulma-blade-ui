@props(['type' => 'is-primary', 'value' => 'Submit'])
<div class="field">
    <div class="control">
        <input type="submit" value="{{ $value }}"{{ $attributes->merge(['class' => 'button '.$type]) }} />
    </div>
</div>
