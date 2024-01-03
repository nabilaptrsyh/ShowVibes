<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoremoviesRequest;
use App\Http\Requests\UpdatemoviessRequest;
use App\Models\Movies;
use Illuminate\Support\Facades\Http;

class AdminMoviesController extends Controller {
    public function index()
    {
        $movies = Movies::latest()->paginate(5);
        return view('dashboard.admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('dashboard.admin.layouts.create', [
            'movies' => Movies::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremoviesRequest $request) {
        $request->validated([
            'nama' => 'required|string|max:255',
            'genre' => 'required|string',
            'rating' => 'required|integer',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:32x32',
        ]);

        // Menggunakan transaksi database untuk memastikan konsistensi

        try {
            // Menyimpan buku
            $movie = Movies::create($request->all());
            return redirect()->route('dashboard.admin.layouts.index')->with('success', 'Buku berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Rollback transaksi jika ada kesalahan

            return redirect()->route('dashboard.admin.layouts.index')->with('error', 'Buku gagal ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Movies $movie)
    {
        return view('dashboard.admin.layouts.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movies $movie)
    {
        return view('dashboard.admin.layouts.edit', [
            // 'nama' => $nama,
            // 'genre' => $genre,
            // 'rating' => $rating

            // 'book' => $book,
            // 'writters' => $writters,
            // 'publishers' => $publishers,
            // 'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemoviessRequest $request, Movies $movie)
    {
        $request->validated([
            'nama' => 'required|string|max:255',
            'genre' => 'required|string',
            'rating' => 'required|integer',
        ]);

        try {
            $movie->update($request->all());
            return redirect()->route('dashboard.admin.layouts.index')->with('success', 'Movie berhasil diupdate.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.layouts.index')->with('error', 'Movie gagal diupdate.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movies $movie)
    {
        try {
            $movie->delete();
            return redirect()->route('dashboard.admin.layouts.index')->with('success', 'Movie berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.admin.layouts.index')->with('error', 'Movie gagal dihapus.');
        }
    }
}
