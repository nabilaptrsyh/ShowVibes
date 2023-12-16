<div class="relative mt-3 md:mt-0">
    <input
        wire:model.debounce.500ms="search"
        wire:keydown.escape="resetSearch"
        wire:keydown="searchMovie"
        type="text"
        class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Cari"
    >
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24">
            <path class="heroicon-ui" d="M16.32 14.915.39 5.4a1 1 0 01-1.42 1.41-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/>
        </svg>
    </div>

    <div class="spinner"></div>

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
