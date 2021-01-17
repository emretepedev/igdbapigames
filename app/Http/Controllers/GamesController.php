<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function show($slug)
    {
        $game = Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => env('IGDB_CLIENT_SECRET'),
        ])
            ->withBody(
                'fields
                name,
                cover.url,
                first_release_date,
                hypes,
                platforms.abbreviation,
                rating,
                slug,
                involved_companies.company.name,
                genres.name,
                aggregated_rating,
                summary,
                websites.*,
                videos.*,
                screenshots.*,
                similar_games.cover.url,
                similar_games.name,
                similar_games.rating,
                similar_games.platforms.abbreviation,
                similar_games.slug;

                where
                slug = "'.$slug.'";
                ','text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();

        abort_if(!$game, 404);

        $game = $game[0];

        return view('show', compact('game'));
    }
}
