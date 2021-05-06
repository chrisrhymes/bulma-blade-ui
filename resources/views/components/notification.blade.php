@props(['type' => 'is-info'])
<div {{ $attributes->merge(['class' => 'notification '.$type]) }} x-data="{ open: true }" x-show="open">
    <button class="delete" @click="open = false"></button>
    {{ $slot }}
</div>
