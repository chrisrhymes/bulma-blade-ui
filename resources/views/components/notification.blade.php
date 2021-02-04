@props(['type' => 'is-info'])
<div {{ $attributes->merge(['class' => 'notification '.$type]) }}>
    <button class="delete"></button>
    {{ $slot }}
</div>
