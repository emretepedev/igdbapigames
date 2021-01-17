<div wire:init="loadRecentlyReviewed" class="recently-reviewed-container space-y-12 mt-8">
    @forelse($recentlyReviewed as $game)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="{{ route('games.show', $game['slug']) }}">
                    <img class="w-32 lg:w-48 h-40 lg:h-56 hover:opacity-75 transition ease-in-out duration-150" src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="{{ $game['name'] }}" title="{{ $game['name'] }}">
                </a>
                @if(array_key_exists('rating', $game))
                    <div id="review_{{ $game['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right: -20px; bottom: -20px;">
                        {{--progressbar.js works in here--}}
                    </div>
                @endif
            </div>
            <div class="ml-12">
                <a class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4" href="{{ route('games.show', $game['slug']) }}">
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
                <p class="mt-6 text-gray-400 hidden lg:block">
                    {{ $game['summary'] }}
                </p>
            </div>
        </div>
    @empty
        @foreach(range(1, 3) as $game)
            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                <div class="relative flex-none">
                    <div class="bg-gray-700 w-32 lg:w-44 h-40 lg:h-56"></div>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right: -20px; bottom: -20px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            <div class="spinner"></div>
                        </div>
                    </div>
                </div>
                <div class="ml-12">
                    <div class="block bg-gray-600 rounded w-28 lg:w-40 h-5 mt-4"></div>
                    <div class="block bg-gray-600 rounded mt-3 w-20 h-5 lg:hidden"></div>
                    <div class="mt-8 space-y-4 hidden lg:block">
                        <div class="bg-gray-600 rounded h-5 w-80"></div>
                        <div class="bg-gray-600 rounded h-5 w-80"></div>
                        <div class="bg-gray-600 rounded h-5 w-80"></div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>

@push('scripts')
    @include('components._rating', [
        'event' => 'reviewGameWithRatingAdded'
    ])
@endpush