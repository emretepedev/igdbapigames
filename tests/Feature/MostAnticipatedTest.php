<?php

namespace Tests\Feature;

use App\Http\Livewire\MostAnticipated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class MostAnticipatedTest extends TestCase {

    /** @test */
    public function the_main_page_shows_most_anticipated()
    {
        Http::fake([
            'https://api.igdb.com/v4/games' => $this->fakeMostAnticipated(),
        ]);

        Livewire::test(MostAnticipated::class)
            ->assertSet('mostAnticipated', [])
            ->call('loadMostAnticipated')
            ->assertSee('Fake Immortals Fenyx Rising')
            ->assertSee('fake-immortals-fenyx-rising')
            ->assertSee('co2g0b')
            ->assertSee('Dec 03, 2020');
    }

    private function fakeMostAnticipated()
    {
        return Http::response([
            0 => [
                "id" => 1877,
                "cover" => [
                    "id" => 82217,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rft.jpg"
                ],
                "first_release_date" => 1607558400,
                "hypes" => 1028,
                "name" => "Cyberpunk 2077",
                "slug" => "cyberpunk-2077"
            ],
            1 => [
                "id" => 100413,
                "cover" => [
                    "id" => 119926,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2kja.jpg"
                ],
                "first_release_date" => 1603929600,
                "hypes" => 93,
                "name" => "Watch Dogs: Legion",
                "slug" => "watch-dogs-legion"
            ],
            2 => [
                "id" => 119357,
                "cover" => [
                    "id" => 114059,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2g0b.jpg"
                ],
                "first_release_date" => 1606953600,
                "hypes" => 48,
                "name" => "Fake Immortals Fenyx Rising",
                "slug" => "fake-immortals-fenyx-rising"
            ],
            3 => [
                "id" => 79134,
                "cover" => [
                    "id" => 82162,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rea.jpg"
                ],
                "first_release_date" => 1608163200,
                "hypes" => 40,
                "name" => "Ancient Cities",
                "slug" => "ancient-cities"
            ]
        ]);
    }
}
