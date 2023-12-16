<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchMovieDropdown extends Component
{
    public $search = '';
    public $searchResult = [];

    public function searchMovie()
    {
        // Validasi panjang string pencarian
        if (strlen($this->search) > 2) {
            $response = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie', [
                    'query' => $this->search,
                ]);

            if ($response->successful()) {
                $this->searchResult = collect($response->json()['results'])->take(7);
            }
        } else {

            $this->searchResult = collect([]);
        }
    }

    public function render()
    {
        return view('livewire.search-movie-dropdown', [
            'searchResult' => $this->searchResult,
        ]);
    }
}
