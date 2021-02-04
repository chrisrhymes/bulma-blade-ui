@props(['alt' => '', 'footer' => null])
<div class="card">
    @if($attributes->has('image'))
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="{{ $attributes->whereStartsWith('image')->first() }}" alt="{{ $alt }}">
            </figure>
        </div>
    @endif
    @if($attributes->has('title'))
        <header class="card-header">
            <p class="card-header-title">
                {{ $attributes->whereStartsWith('title')->first() }}
            </p>
        </header>
    @endif
    <div class="card-content">
        {{ $slot }}
    </div>
    @if($footer)
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
