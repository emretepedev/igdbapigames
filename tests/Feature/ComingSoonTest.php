<?php

namespace Tests\Feature;

use App\Http\Livewire\ComingSoon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class ComingSoonTest extends TestCase {

    /** @test */
    public function the_main_page_shows_coming_soon()
    {
        Http::fake([
            'https://api.igdb.com/v4/games' => $this->fakeComingSoon(),
        ]);

        Livewire::test(ComingSoon::class)
            ->assertSet('comingSoon', [])
            ->call('loadComingSoon')
            ->assertSee('Fake Biomutant')
            ->assertSee('fake-biomutant')
            ->assertSee('co1rse')
            ->assertSee('Dec 31, 2021');
    }

    private function fakeComingSoon()
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
                "id" => 54842,
                "cover" => [
                    "id" => 82670,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rse.jpg"
                ],
                "first_release_date" => 1640908800,
                "hypes" => 157,
                "name" => "Fake Biomutant",
                "slug" => "fake-biomutant"
            ],
            2 => [
                "id" => 103281,
                "cover" => [
                    "id" => 111228,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2dto.jpg"
                ],
                "first_release_date" => 1640908800,
                "hypes" => 99,
                "name" => "Halo Infinite",
                "slug" => "halo-infinite"
            ],
            3 => [
                "id" => 112874,
                "cover" => [
                    "id" => 115194,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2gvu.jpg"
                ],
                "first_release_date" => 1640908800,
                "hypes" => 86,
                "name" => "Horizon Forbidden West",
                "slug" => "horizon-forbidden-west"
            ]
        ]);
    }
}
