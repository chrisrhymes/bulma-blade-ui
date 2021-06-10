@props(['trigger', 'type' => 'is-primary', 'title', 'cancel' => 'Cancel'])
<div x-data="{ active: false }">
    <button {{ $attributes->merge(['class' => 'button '.$type]) }} @click="active = true">{{ $trigger }}</button>
    <div class="modal" :class="{ 'is-active': active == true }">
        <div class="modal-background" @click="active = false"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">{{ $title }}</p>
                <button class="delete" aria-label="close" @click="active = false"></button>
            </header>
            <section class="modal-card-body">
                {{ $slot }}
            </section>
            @isset($footer)
                <footer class="modal-card-foot">
                    <button class="button" @click="active = false">{{ $cancel }}</button>
                    {{ $footer }}
                </footer>
            @endisset
        </div>
    </div>
</div>
