@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="film-populer">
            <h2 class="uppercase tracking-wider text-red-500 text-lg font-semibold">Film Populer</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
                
                
            </div>
        </div>

        <div class="Akan-Dimulai py-24">
            <h2 class="uppercase tracking-wider text-red-500 text-lg font-semibold">Akan Dimulai</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres" />
                @endforeach
            </div>
        </div>
    </div>
@endsection

