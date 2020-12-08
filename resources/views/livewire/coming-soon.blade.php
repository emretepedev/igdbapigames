<div wire:init="loadComingSoon" class="coming-soon-container space-y-10 mt-8">
    @forelse ($comingSoon as $game)
        <div class="game flex">
            <a href="{{ route('games.show', $game['slug']) }}">
                <img class="w-16 hover:opacity-75 transition ease-in-out duration-150" src="{{ Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) }}" alt="{{ $game['name'] }}" title="{{ $game['name'] }}">
            </a>
            <div class="ml-4">
                <a class="hover:text-gray-300" href="{{ route('games.show', $game['slug']) }}">
                    {{ $game['name'] }}
                </a>
                <div class="text-gray-400 text-sm mt-1">
                    {{ \Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
                </div>
            </div>
        </div>
    @empty
        @foreach(range(1, 4) as $game)
            <div class="game flex">
                <div class="bg-gray-800 w-16 h-20">
                    <div class="spinner mt-10"></div>
                </div>
                <div class="ml-4 space-y-3">
                    <div class="block bg-gray-700 rounded w-20 h-4 mt-2"></div>
                    <div class="block bg-gray-700 rounded w-14 h-4"></div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>