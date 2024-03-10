@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @if (count($gigs) == 0)
            <h2> No listing found </h2>
        @endif
        @foreach ($gigs as $gig)
            <x-gig-card :gig="$gig" />
        @endforeach
    </div>
@endsection
