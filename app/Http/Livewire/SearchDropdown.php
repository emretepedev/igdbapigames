<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';
    public $searchResults = [];

    public function render()
    {
        if(strlen($this->search) >= 2){
            $this->searchResults = Http::withHeaders([
                'Client-ID' => '9qm78ysatgv5erf6tei65f3fhuc5zy',
                'Authorization' => 'Bearer kf54zjh6ufvxky4826b4p0carbxs29',
            ])
                ->withBody(
                    'search "'.$this->search.'";
                fields
                name,
                slug,
                cover.url;
                
                limit 6;','text/plain')
                ->post('https://api.igdb.com/v4/games')
                ->json();
        }

        return view('livewire.search-dropdown');
    }
}
