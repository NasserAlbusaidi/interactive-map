@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        @livewire('search-bar')

        {{-- <livewire:logistic-calculator /> --}}
        {{-- @livewire('chat') --}}

        @livewire('quiz')
        @livewire('leaderboard')

    </div>
@endsection
