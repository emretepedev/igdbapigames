<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {
        $beforeFiveMonths = Carbon::now()->subMonth(5)->timestamp;
        $afterFiveMonths = Carbon::now()->addMonth(5)->timestamp;

        $this->popularGames = Cache::remember('popular-games', 7, function () use ($beforeFiveMonths, $afterFiveMonths) {
            sleep(3);
            return Http::withHeaders([
                'Client-ID' => '9qm78ysatgv5erf6tei65f3fhuc5zy',
                'Authorization' => 'Bearer kf54zjh6ufvxky4826b4p0carbxs29',
            ])
                ->withBody(
                    'fields
                name,
                slug,
                cover.url,
                first_release_date,
                hypes,
                platforms.abbreviation,
                rating;
                
                where
                hypes != null &
                platforms = (48,49,130,6) &
                (
                first_release_date >= '.$beforeFiveMonths.' &
                first_release_date < '.$afterFiveMonths.'
                );
                
                sort hypes desc;
                
                limit 12;','text/plain')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        });

        collect($this->formatForView($this->popularGames))->filter(function ($game){
            return $game['rating'];
        })->each(function ($game){
            $this->emit('gameWithRatingAdded', [
                'slug' => $game['slug'],
                'rating' => $game['rating'] / 100,
            ]);
        });
    }
    
    public function render()
    {
        return view('livewire.popular-games');
    }

    private function formatForView($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
                'rating' => isset($game['rating']) ? round($game['rating']) : null,
                'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(', '),
            ]);
        })->toArray();
    }
}
