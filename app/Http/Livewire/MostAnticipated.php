<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $beforeTwoMonths = Carbon::now()->subMonth(2)->timestamp;
        $afterFourMonths = Carbon::now()->addMonth(4)->timestamp;

        $this->mostAnticipated = Http::withHeaders([
            'Client-ID' => '9qm78ysatgv5erf6tei65f3fhuc5zy',
            'Authorization' => 'Bearer kf54zjh6ufvxky4826b4p0carbxs29',
        ])
            ->withBody(
                'fields
                name,
                slug,
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
                
                limit 4;','text/plain')
            ->post('https://api.igdb.com/v4/games')
            ->json();
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
