<?php

namespace App\Http\Controllers;

use App\Jobs\DenemeJob;
use App\Models\Deneme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        /*$current = Carbon::now()->timestamp;

        $beforeTwoMonths = Carbon::now()->subMonth(2)->timestamp;
        $beforeFiveMonths = Carbon::now()->subMonth(5)->timestamp;

        $afterFourMonths = Carbon::now()->addMonth(4)->timestamp;
        $afterFiveMonths = Carbon::now()->addMonth(5)->timestamp;*/

        /*$popularGames = Http::withHeaders([
            'Client-ID' => '9qm78ysatgv5erf6tei65f3fhuc5zy',
            'Authorization' => 'Bearer kf54zjh6ufvxky4826b4p0carbxs29',
        ])
            ->withBody(
                'fields
                name,
                cover.url,
                first_release_date,
                hypes,
                platforms.abbreviation,
                rating;

                where
                hypes != null &
                rating != null &
                platforms = (48,49,130,6) &
                (
                first_release_date >= '.$beforeFiveMonths.' &
                first_release_date < '.$afterFiveMonths.'
                );

                sort hypes desc;

                limit 12;',
                'text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();*/

        /*$recentlyReviewed = Http::withHeaders([
            'Client-ID' => '9qm78ysatgv5erf6tei65f3fhuc5zy',
            'Authorization' => 'Bearer kf54zjh6ufvxky4826b4p0carbxs29',
        ])
            ->withBody(
                'fields
                name,
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
                
                limit 3;',
                'text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();*/

        /*$mostAnticipated = Http::withHeaders([
            'Client-ID' => '9qm78ysatgv5erf6tei65f3fhuc5zy',
            'Authorization' => 'Bearer kf54zjh6ufvxky4826b4p0carbxs29',
        ])
            ->withBody(
                'fields
                name,
                cover.url,
                first_release_date,
                hypes;
                
                where
                hypes != null &
                (
                first_release_date >= '.$beforeTwoMonths.' &
                first_release_date < '.$afterFourMonths.'
                );
                
                sort hypes desc;
                
                limit 4;',
                'text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();*/

        /*$comingSoon = Http::withHeaders([
            'Client-ID' => '9qm78ysatgv5erf6tei65f3fhuc5zy',
            'Authorization' => 'Bearer kf54zjh6ufvxky4826b4p0carbxs29',
        ])
            ->withBody(
                'fields
                name,
                cover.url,
                first_release_date,
                hypes,
                rating;
                
                where
                hypes != null &
                first_release_date >= '.$current.' &
                hypes > 80;
                
                sort first_release_date asc;
                
                limit 4;',
                'text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();*/
        /*DenemeJob::dispatch();

        $denemes = Deneme::get();

        $deneme = $denemes->find(1);*/

        /*$deneme->each(function($post)
        {
            dd($post);
        });*/

        /*dd($deneme);*/

        return view('index'/*, compact('popularGames', 'recentlyReviewed', 'mostAnticipated', 'comingSoon')*/);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $beforeTwoMonths = Carbon::now()->subMonth(2)->timestamp;
        $afterFourMonths = Carbon::now()->addMonth(4)->timestamp;

        $game = Http::withHeaders([
            'Client-ID' => '9qm78ysatgv5erf6tei65f3fhuc5zy',
            'Authorization' => 'Bearer kf54zjh6ufvxky4826b4p0carbxs29',
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
