@props(['trigger', 'type' => 'is-primary'])
<div x-data="{ active: false }">
    <button {{ $attributes->merge(['class' => 'button '.$type]) }} @click="active = true">{{ $trigger }}</button>
    <div class="modal" :class="{ 'is-active': active == true }">
        <div class="modal-background" @click="active = false"></div>
        <div class="modal-content">
            {{ $slot }}
        </div>
        <button class="modal-close is-large" aria-label="close" @click="active = false"></button>
    </div>
</div>
