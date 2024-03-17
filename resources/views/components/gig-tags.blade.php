@props(['tagsCsv'])

@if ($tagsCsv)
    @php
        $tags = array_map('trim',explode(',', $tagsCsv));
    @endphp
    <ul class="flex">
        @foreach ($tags as $tag)
            <li
                {{ $attributes->merge(['class' => 'flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 ']) }}>
                <a href="/gigs/?tag={{ $tag }}">{{ $tag }}</a>
            </li>
        @endforeach
    </ul>
@endif
