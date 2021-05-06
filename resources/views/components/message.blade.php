@props(['title', 'type' => 'is-info'])

<article {{ $attributes->merge(['class' => 'message '.$type]) }} x-data="{ open: true }" x-show="open">
    <div class="message-header">
        <p>{{ $title }}</p>
        <button class="delete" aria-label="delete" @click="open = false"></button>
    </div>
    <div class="message-body">
        {{ $slot }}
    </div>
</article>
