@props(['gig'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block" src="{{$gig->logo ? asset('storage/'.$gig->logo) : asset('images/no-image.png')}}" alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/gigs/{{ $gig->id }}">{{ $gig->title }}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $gig->company }}</div>
            <x-gig-tags :tagsCsv="$gig->tags" class="text-xs"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $gig->location }}
            </div>
        </div>
    </div>
</x-card>