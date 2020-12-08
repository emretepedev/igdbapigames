@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="{{ $game['name'] }}" title="{{ $game['name'] }}">
            </div>
            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-tight mt-1">{{ $game['name'] }}</h2>
                <div class="text-gray-400 text-sm">
                    @if(array_key_exists('genres', $game))
                        <span>
                        @foreach($game['genres'] as $genre)
                                {{ $genre['name'] }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </span>
                        &middot;
                    @endif
                    <span>
                        @foreach($game['involved_companies'] as $company)
                            {{ $company['company']['name'] }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </span>
                    &middot;
                    <span>
                        @foreach($game['platforms'] as $platform)
                            @if (array_key_exists('abbreviation', $platform))
                                {{ $platform['abbreviation'] }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endif
                        @endforeach
                    </span>
                </div>
                <div class="flex flex-wrap items-center mt-8">
                    @if(array_key_exists('aggregated_rating', $game) || array_key_exists('rating', $game))
                        @if(array_key_exists('rating', $game))
                            <div class="flex items-center">
                                <div id="memberRating" class="w-16 h-16 bg-gray-800 rounded-full relative">
                                    @push('scripts')
                                        @include('components._rating', [
                                            'slug' => 'memberRating',
                                            'rating' => $game['rating'],
                                            'event' => null
                                        ])
                                    @endpush
                                </div>
                                <div class="ml-4 text-xs @if(!array_key_exists('aggregated_rating', $game)) mr-56 @endif lg:mr-0">Member <br> Score</div>
                            </div>
                        @endif
                        @if(array_key_exists('aggregated_rating', $game))
                            <div class="flex items-center @if(array_key_exists('rating', $game)) ml-12 @endif">
                                <div id="criticRating" class="w-16 h-16 bg-gray-800 rounded-full relative">
                                    @push('scripts')
                                        @include('components._rating', [
                                            'slug' => 'criticRating',
                                            'rating' => $game['aggregated_rating'],
                                            'event' => null
                                        ])
                                    @endpush
                                </div>
                                <div class="ml-4 text-xs @if(array_key_exists('rating', $game)) mr-20 @else mr-24 @endif lg:mr-0">Critic <br> Score</div>
                            </div>
                        @endif
                    @endif

                    <div class="flex items-center space-x-4 lg:mt-0 ml-0 @if(array_key_exists('aggregated_rating', $game) || array_key_exists('rating', $game)) mt-4 lg:ml-12 @endif">
                        @foreach($game['websites'] as $website)
                            @if($website['category'] == 1)
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a class="hover:text-gray-400" href="{{ $website['url'] }}"><i class="fas fa-globe-europe"></i></a>
                                </div>
                            @endif
                            @if($website['category'] == 8)
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a class="hover:text-gray-400" href="{{ $website['url'] }}"><i class="fab fa-instagram"></i></a>
                                </div>
                            @endif
                            @if($website['category'] == 5)
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a class="hover:text-gray-400" href="{{ $website['url'] }}"><i class="fab fa-twitter"></i></a>
                                </div>
                            @endif
                            @if($website['category'] == 4)
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a class="hover:text-gray-400" href="{{ $website['url'] }}"><i class="fab fa-facebook"></i></a>
                                </div>
                            @endif
                            @if($website['category'] == 3)
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a class="hover:text-gray-400" href="{{ $website['url'] }}"><i class="fab fa-wikipedia-w"></i></a>
                                </div>
                            @endif
                            @if($website['category'] == 9)
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a class="hover:text-gray-400" href="{{ $website['url'] }}"><i class="fab fa-youtube"></i></a>
                                </div>
                            @endif
                            @if($website['category'] == 13)
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a class="hover:text-gray-400" href="{{ $website['url'] }}"><i class="fab fa-steam"></i></a>
                                </div>
                            @endif
                            @if($website['category'] == 14)
                                <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                    <a class="hover:text-gray-400" href="{{ $website['url'] }}"><i class="fab fa-reddit"></i></a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <p class="mt-12">
                    {{ $game['summary'] }}
                </p>
                <div class="mt-12">
                    <a class="inline-flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150 justify-center items-center" target="_blank" href="https://www.youtube.com/watch?v={{ $game['videos'][0]['video_id'] }}">
                        <i class="fas fa-play"></i>
                        <span class="ml-2">Play Trailer</span>
                    </a>
                </div>
            </div>
        </div> {{--end game details--}}

        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
                @foreach($game['screenshots'] as $screenshot)
                    <div>
                        <a target="_blank" href="{{ Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']) }}"><img class="hover:opacity-75 transition ease-in-out duration-150" src="{{ Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']) }}" alt="{{ $game['name'] }}" title="{{ $game['name'].' '.++$loop->index }}"></a>
                    </div>
                @endforeach
            </div>
        </div> {{--end images container--}}
        <div class="similar-games-container mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar Games</h2>
            <div class="similar-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl: xl:grid-cols-6 gap-12">
                @foreach($game['similar_games'] as $game)
                    <div class="game mt-8">
                        <div class="relative inline-block">
                            @if(array_key_exists('cover', $game))
                                <a href="{{ route('games.show', $game['slug']) }}">
                                    <img class="hover:opacity-75 transition ease-in-out duration-150" src="{{ Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) }}" alt="{{ $game['name'] }}" title="{{ $game['name'] }}">
                                </a>
                            @endif
                            @if(array_key_exists('rating', $game))
                                <div id="{{ $game['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right: -20px; bottom: -20px;">
                                    @push('scripts')
                                        @include('components._rating', [
                                            'slug' => $game['slug'],
                                            'rating' => $game['rating'],
                                            'event' => null
                                        ])
                                    @endpush
                                </div>
                            @endif
                        </div>
                        <a class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8" href="{{ route('games.show', $game['slug']) }}">{{ $game['name'] }}</a>
                        @if(array_key_exists('platforms', $game))
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
                        @endif
                    </div>
                @endforeach
            </div> {{--end similar games--}}
        </div> {{--end similar games container--}}
    </div> {{--end container--}}
@endsection