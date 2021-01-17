<?php

namespace Tests\Feature;

use App\Http\Livewire\RecentlyReviewed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class RecentlyReviewedTest extends TestCase {

    /** @test */
    public function the_main_page_shows_recently_reviewed()
    {
        Http::fake([
            'https://api.igdb.com/v4/games' => $this->fakeRecentlyReviewed(),
        ]);

        Livewire::test(RecentlyReviewed::class)
            ->assertSet('recentlyReviewed', [])
            ->call('loadRecentlyReviewed')
            ->assertSee('Fake Watch Dogs: Legion')
            ->assertSee('fake-watch-dogs-legion')
            ->assertSee('co2kja')
            ->assertSee('PC')
            ->assertSee('PS4')
            ->assertSee('XONE')
            ->assertSee('PS5')
            ->assertSee('Series X')
            ->assertSee('Stadia')
            ->assertSee('In Watch Dogs: Legion, near future London is facing its downfall...unless you do something about it. Build a resistance, fight back, and give the city back to the people. It’s time to rise up.');
    }

    private function fakeRecentlyReviewed()
    {
        return Http::response([
            0 => [
                "id" => 100413,
                "cover" => [
                    "id" => 119926,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2kja.jpg"
                ],
                "first_release_date" => 1603929600,
                "hypes" => 93,
                "name" => "Fake Watch Dogs: Legion",
                "platforms" => [
                    0 => [
                        "id" => 6,
                        "abbreviation" => "PC"
                    ],
                    1 => [
                        "id" => 48,
                        "abbreviation" => "PS4"
                    ],
                    2 => [
                        "id" => 49,
                        "abbreviation" => "XONE"
                    ],
                    3 => [
                        "id" => 167,
                        "abbreviation" => "PS5"
                    ],
                    4 => [
                        "id" => 169,
                        "abbreviation" => "Series X"
                    ],
                    5 => [
                        "id" => 170,
                        "abbreviation" => "Stadia"
                    ]
                ],
                "rating" => 64.40488301119,
                "rating_count" => 8,
                "slug" => "fake-watch-dogs-legion",
                "summary" => "In Watch Dogs: Legion, near future London is facing its downfall...unless you do something about it. Build a resistance, fight back, and give the city back to the people. It’s time to rise up."
            ],
            1 => [
                "id" => 138343,
                "cover" => [
                    "id" => 114155,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2g2z.jpg"
                ],
                "first_release_date" => 1605830400,
                "hypes" => 23,
                "name" => "Hyrule Warriors: Age Of Calamity",
                "platforms" => [
                    0 => [
                        "id" => 130,
                        "abbreviation" => "Switch"
                    ]
                ],
                "rating" => 92.268937820246,
                "rating_count" => 6,
                "slug" => "hyrule-warriors-age-of-calamity",
                "summary" => "See Hyrule 100 years before the Legend of Zelda: Breath of the Wild game and experience the events of the Great Calamity Join the struggle that brought Hyrule to its knees. Learn more about Zelda, the four Champions, the King of Hyrule and more through dramatic cutscenes as they try to save the kingdom from Calamity. The Hyrule Warriors: Age of Calamity game is the only way to firsthand see what happened 100 years ago. -Battle hordes of Hyrule’s most formidable foes -From barbaric Bokoblins to towering Lynels, Ganon’s troops have emerged in droves. Playable heroes like Link, Zelda and more must use their distinct abilities to carve through hundreds of enemies to save Hyrule from the impending Calamity."
            ],
            2 => [
                "id" => 121752,
                "cover" => [
                    "id" => 114223,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2g4v.jpg"
                ],
                "first_release_date" => 1603756800,
                "hypes" => 14,
                "name" => "Ghostrunner",
                "platforms" => [
                    0 => [
                        "id" => 6,
                        "abbreviation" => "PC"
                    ],
                    1 => [
                        "id" => 48,
                        "abbreviation" => "PS4"
                    ],
                    2 => [
                        "id" => 49,
                        "abbreviation" => "XONE"
                    ],
                    3 => [
                        "id" => 130,
                        "abbreviation" => "Switch"
                    ]
                ],
                "rating" => 80.190470910976,
                "rating_count" => 12,
                "slug" => "ghostrunner",
                "summary" => "Ascend humanity’s last remaining shelter, a great tower-city. The tower is torn by violence, poverty and chaos. Conquer your enemies, discover the secrets of the superstructure and your own origin and obtain the power to challenge The Keymaster."
            ]
        ]);
    }
}
