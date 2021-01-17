<div wire:init="loadPopularGames" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl: xl:grid-cols-6 gap-12 pb-16 border-b border-gray-800">
    @forelse($popularGames as $game)
        <div class="game mt-8">
            <div class="relative inline-block">
                <a href="{{ route('games.show', $game['slug']) }}">
                    <img class="hover:opacity-75 transition ease-in-out duration-150" src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="{{ $game['name'] }}" title="{{ $game['name'] }}">
                </a>
                @if(array_key_exists('rating', $game))
                    <div id="{{ $game['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px;">
                        {{--progressbar.js works in here--}}
                    </div>
                @endif
            </div>
            <a class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8" href="{{ route('games.show', $game['slug']) }}">
                {{ $game['name'] }}
            </a>
            <div class="text-gray-400 mt-1">
                @foreach($game['platforms'] as $platform)
                    @if (array_key_exists('abbreviation', $platform))
                        {{ $platform['abbreviation'] }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    @empty
        @foreach(range(1, 12) as $game)
            <div class="game mt-8">
                <div class="relative inline-block">
                    <div class="bg-gray-800 w-44 h-56"></div>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            <div class="spinner"></div>
                        </div>
                    </div>
                </div>
                <div class="block bg-gray-700 rounded w-32 h-5 mt-4"></div>
                <div class="block bg-gray-700 rounded mt-3 w-24 h-4"></div>
            </div>
        @endforeach
    @endforelse
</div> {{--end popular games--}}

@push('scripts')
    @include('components._rating', [
        'event' => 'gameWithRatingAdded'
    ])
@endpush