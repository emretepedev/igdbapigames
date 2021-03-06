<div class="relative" x-data="{ isVisible: true }" @click.away="isVisible = false">
    <input wire:model.debounce.300ms="search"
           type="text"
           class="bg-gray-800 text-sm rounded-full w-64 px-3 pl-8 py-1 focus:outline-none"
           placeholder="Search (Press '/' to focus here!)"
           x-ref="search"
           @keydown.window="
           if (event.keyCode === 55) {
           event.preventDefault();
           $refs.search.focus();
           }
           "
           @focus="isVisible = true"
           @keydown.escape.window="isVisible = false"
           @keydown="isVisible = true"
           @keydown.shift.tab="isVisible = false"
    >
    <div class="absolute top-0 flex items-center h-full ml-2">
        <i class="fas fa-search fill-current text-gray-400 w-4"></i>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3" style="position: absolute;"></div>

    @if(strlen($search) >= 2)
        <div class="absolute z-50 bg-gray-800 text-sm rounded w-64 mt-2" x-show.transition.opacity.duration.500="isVisible">
            @if(count($searchResults) > 0)
                <ul>
            @foreach($searchResults as $game)
                <li class="border-b border-gray-700">
                    <a href="{{ route('games.show', $game['slug']) }}" class="block hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-3 py-3" @if(++$loop->last) @keydown.tab="isVisible = false" @endif>
                        @if (array_key_exists('cover', $game))
                            <img src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}" alt="{{ $game['name'] }}" title="{{ $game['name'] }}" class="w-10">
                        @else
                            <img src="https://via.placeholder.com/264x352" alt="{{ $game['name'] }}" title="{{ $game['name'] }}" class="w-10">
                        @endif
                        <span class="ml-4">{{ $game['name'] }}</span>
                    </a>
                </li>
            @endforeach
                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif
</div>