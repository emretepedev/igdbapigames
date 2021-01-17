<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Livewire\Component;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $current = Carbon::now()->timestamp;
        $beforeTwoMonths = Carbon::now()->subMonth(2)->timestamp;

        $this->recentlyReviewed = Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => env('IGDB_CLIENT_SECRET'),
        ])
            ->withBody(
                'fields
                name,
                slug,
                cover.url,
                first_release_date,
                hypes,
                platforms.abbreviation,
                rating,
                rating_count,
                summary;

                where
                hypes != null &
                rating != null &
                platforms = (48,49,130,6) &
                (
                first_release_date >= '.$beforeTwoMonths.' &
                first_release_date < '.$current.' &
                rating_count > 5
                );

                sort hypes desc;

                limit 3;','text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();

        collect($this->formatForView($this->recentlyReviewed))->filter(function ($game){
            return $game['rating'];
        })->each(function ($game){
            $this->emit('reviewGameWithRatingAdded', [
                'slug' => 'review_'.$game['slug'],
                'rating' => $game['rating'] / 100,
            ]);
        });
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
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
