@props(['image', 'alt' => '', 'right' => null])
<article class="media">
    <figure class="media-left">
        <p class="image is-64x64">
            <img src="{{ $image }}" alt="{{ $alt }}">
        </p>
    </figure>
    <div class="media-content">
        {{ $slot }}
    </div>
    @if($right)
        <div class="media-right">
            {{ $right }}
        </div>
    @endif
</article>
