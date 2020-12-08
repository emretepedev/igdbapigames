<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;

        $this->comingSoon = Http::withHeaders([
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
                rating;
                
                where
                hypes != null &
                first_release_date >= '.$current.' &
                hypes > 80;
                
                sort first_release_date asc;
                
                limit 4;','text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
