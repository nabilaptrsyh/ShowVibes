<div class="relative mt-3 md:mt-0">
    <div class="absolute top-0 left-0 ml-2 mt-1">
        <svg class="fill-current w-4 text-gray-500" viewBox="0 0 24 24">
            <path class="heroicon-ui" d="M16.32 14.915.39 5.4a1 1 0 01-1.42 1.41-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/>
        </svg>
    </div>

    <input
        wire:model.debounce.500ms="search"
        wire:keydown.escape="resetSearch"
        wire:keydown="searchMovie"
        type="text"
        class="bg-gray-800 text-sm rounded-full w-64 px-10 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Cari"
    >
    
    <div wire:loading class="absolute top-0 right-0 mr-4 mt-3">
        <svg class="animate-spin h-5 w-5 text-gray-500" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5a8 8 0 018-8V0C7.373 0 2 5.373 2 12h4zm2 5a8 8 0 018-8V0C9.373 0 4 5.373 4 12h4zm2 5a8 8 0 018-8V0C11.373 0 6 5.373 6 12h4zm10-16v4a8 8 0 00-8 8h4a4 4 0 014-4h4z"></path>
        </svg>
    </div>

    @if(strlen($search) > 2)
        <div class="absolute bg-gray-800 rounded w-64 mt-4">
            <ul>
                @forelse($searchResult as $result)
                    <li class="border-b border-gray-700">
                        <a href="{{ route('movies.show', $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                            @if ($result['poster_path'])
                                <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                            @else
                                <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                            @endif
                            <span class="ml-4">{{ $result['title'] }}</span>
                        </a>
                    </li>
                @empty
                    <li class="px-3 py-3">Tidak ada hasil yang ditemukan "{{ $search }}"</li>
                @endforelse
            </ul>
        </div>
    @endif
</div>
