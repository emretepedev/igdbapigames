<?php

namespace App\Jobs;

use App\Models\Deneme;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class DenemeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->saveMatches();
    }

    public function getMatches()
    {
        return Http::withHeaders([
            'Client-ID' => '9qm78ysatgv5erf6tei65f3fhuc5zy',
            'Authorization' => 'Bearer kf54zjh6ufvxky4826b4p0carbxs29',
        ])
            ->withBody(
                'fields
                name,
                slug;
                
                limit 1;','text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }

    public function saveMatches()
    {
        $matches = $this->getMatches();

        collect($matches)
            ->each(function ($match) {
                Deneme::create([
                    'name' => $match['name'],
                    'slug' => $match['slug'],
                ]);
            });
    }
}
