<?php

namespace App\Livewire;



use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    

    public function render()
    {
        $searchResult = [];

        if (strlen($this->search)> 2) {
            $searchResult = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search);
    
        if ($searchResult->successful()) {
            $searchResult->json()['results'];
        }



        dump($searchResult);

        return view('livewire.search-dropdown',[
            'searchResult' => $searchResult,
        ]);
    }
}
}