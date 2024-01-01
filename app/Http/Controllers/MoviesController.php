<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController 
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */

    // public function index()
    // {
    //     $popularMovies = Http::withToken(config('services.tmdb.token'))
    //         ->get('https://api.themoviedb.org/3/movie/popular')
    //         ->json()['results'];

    //     dump($popularMovies);

    //     return view('index', compact('popularMovies'));
    //     // return view('index');
    // }

    // INI CODINGAN PENGGANTI YANG DIATAS
    public function index()
{
    $apiUrl = 'https://api.themoviedb.org/3/movie/popular';
    $token = config('services.tmdb.token');

    $response = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular');

    if ($response->successful()) {
        $popularMovies = $response->json()['results'];
    } else {
        $popularMovies = [];
    }

    // dd($popularMovies);

    $response = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing');

    if ($response->successful()) {
        $nowPlayingMovies = $response->json()['results'];
    } else {
        $nowPlayingMovies = [];
    }

    $response = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list');

    if ($response->successful()) {
        $genresArray = $response->json()['genres'];
    } else {
        $genresArray = [];
    }

    $genres = collect($genresArray)->mapWithKeys(function ($genre) {
        return [$genre['id'] => $genre['name']];
    });

    // dd($nowPlayingMovies);
    // dump($genres);
     
//      return response()->json([
//             'success' => true,
//             'message' => 'bebas',
//             'data' => $token
//         ]);

    return view('index', compact('popularMovies', 'genres', 'nowPlayingMovies'));
}

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images');

        if ($response->successful()) {
            $movie = $response->json();
        } else {
            $movie = [];
        }

        // dump($movie);

        return view('show', [
            'movie' => $movie,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
