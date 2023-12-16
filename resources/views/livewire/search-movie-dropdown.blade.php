<div class="relative mt-3 md:mt-0">
    <input wire:model.debounce.500ms="search" wire:keydown.escape="resetSearch" wire:keydown="searchMovie" type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" viewBox="0 0 24 24">
            <path class="heroicon-ui" d="M16.32 14.915.39 5.4a1 1 0 01-1.42 1.41-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/>
        </svg>
    </div>
    @if(strlen($search) > 2)
        <div class="absolute bg-gray-800 rounded w-64 mt-4">
            <ul>
                @forelse($searchResult as $result)
                    <li class="border-b border-gray-700">
                        <a href="#" class="block hover:bg-gray-700 px-3 py-3">{{ $result['title'] }}</a>
                    </li>
                @empty
                    <li class="px-3 py-3 text-gray-500">No results found</li>
                @endforelse
            </ul>
        </div>
    @endif
</div>



