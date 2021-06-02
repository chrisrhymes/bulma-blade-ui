@props(['items', 'default' => array_key_first($items), 'type' => ''])

<div x-data="{ tab: '{{ $default }}' }">
    <div {{ $attributes->merge(['class' => 'tabs '.$type]) }}>
        <ul>
            @foreach($items as $tabKey => $tabLabel)
                <li :class="{ 'is-active': tab === '{{ $tabKey }}' }"><a @click="tab = '{{ $tabKey }}'">{{ $tabLabel }}</a></li>
            @endforeach
        </ul>
    </div>
    @foreach($items as $tabKey => $tabLabel)
        <div x-show="tab === '{{ $tabKey }}'">
            {{ ${$tabKey} }}
        </div>
    @endforeach
</div>
