<?php

namespace Tests\Feature;

use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase {

    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function search_bar_does_match_games_to_search_text()
    {
        Http::fake([
            'https://api.igdb.com/v4/games' => $this->fakeSearchGames(),
        ]);

        Livewire::test(SearchDropdown::class)
            ->assertSet('searchResults', [])
            ->set('search', 'zelda')
            ->call('render')
            ->assertSee('Fake Zelda II: The Adventure of Link')
            ->assertSee('fake-zelda-ii-the-adventure-of-link')
            ->assertSee('co1uje')
            ->assertSee('Fake The Legend of Zelda: Four Swords Adventures')
            ->assertSee('fake-the-legend-of-zelda-four-swords-adventures')
            ->assertSee('co25wk');
    }

    private function fakeSearchGames()
    {
        return Http::response([
            0 => [
                "id" => 1025,
                "cover" => [
                    "id" => 86234,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1uje.jpg"
                ],
                "name" => "Fake Zelda II: The Adventure of Link",
                "slug" => "fake-zelda-ii-the-adventure-of-link"
            ],
            1 => [
                "id" => 1034,
                "cover" => [
                    "id" => 100964,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co25wk.jpg"
                ],
                "name" => "Fake The Legend of Zelda: Four Swords Adventures",
                "slug" => "fake-the-legend-of-zelda-four-swords-adventures"
            ],
            2 => [
                "id" => 1029,
                "cover" => [
                    "id" => 76691,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1n6b.jpg"
                ],
                "name" => "The Legend of Zelda: Ocarina of Time",
                "slug" => "the-legend-of-zelda-ocarina-of-time"
            ],
            3 => [
                "id" => 2909,
                "cover" => [
                    "id" => 77440,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1nr4.jpg"
                ],
                "name" => "The Legend of Zelda: A Link Between Worlds",
                "slug" => "the-legend-of-zelda-a-link-between-worlds"
            ],
            4 => [
                "id" => 1030,
                "cover" => [
                    "id" => 76690,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1n6a.jpg"
                ],
                "name" => "The Legend of Zelda: Majora's Mask",
                "slug" => "the-legend-of-zelda-majora-s-mask"
            ],
            5 => [
                "id" => 1027,
                "cover" => [
                    "id" => 111338,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2dwq.jpg"
                ],
                "name" => "The Legend of Zelda: Link's Awakening DX",
                "slug" => "the-legend-of-zelda-link-s-awakening-dx"
            ]
        ]);
    }
}
