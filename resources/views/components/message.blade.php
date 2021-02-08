@props(['title', 'type' => 'is-info'])

<article {{ $attributes->merge(['class' => 'message '.$type]) }}>
    <div class="message-header">
        <p>{{ $title }}</p>
        <button class="delete" aria-label="delete"></button>
    </div>
    <div class="message-body">
        {{ $slot }}
    </div>
</article>
