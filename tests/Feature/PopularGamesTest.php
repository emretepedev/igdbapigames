<?php

namespace Tests\Feature;

use App\Http\Livewire\PopularGames;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class PopularGamesTest extends TestCase {

    /** @test */
    public function the_main_page_shows_popular_games()
    {
        Http::fake([
            'https://api.igdb.com/v4/games' => $this->fakePopularGames(),
        ]);

        Livewire::test(PopularGames::class)
            ->assertSet('popularGames', [])
            ->call('loadPopularGames')
            ->assertSee('Fake Cyberpunk 2077')
            ->assertSee('fake-cyberpunk-2077')
            ->assertSee('co1rft')
            ->assertSee('PC')
            ->assertSee('PS4')
            ->assertSee('XONE')
            ->assertSee('PS5')
            ->assertSee('Series X')
            ->assertSee('Stadia');
    }

    private function fakePopularGames()
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
                "name" => "Fake Cyberpunk 2077",
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
                "slug" => "fake-cyberpunk-2077"
            ],
            1 => [
                "id" => 26950,
                "cover" => [
                    "id" => 111950,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2edq.jpg"
                ],
                "first_release_date" => 1599177600,
                "hypes" => 168,
                "name" => "Marvel's Avengers",
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
                "rating" => 50.132126033085,
                "slug" => "marvels-avengers"
            ],
            2 => [
                "id" => 124448,
                "cover" => [
                    "id" => 104257,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co28g1.jpg"
                ],
                "first_release_date" => 1599177600,
                "hypes" => 133,
                "name" => "Craftopia",
                "platforms" => [
                    0 => [
                        "id" => 6,
                        "abbreviation" => "PC"
                    ]
                ],
                "rating" => 73.97210430564,
                "slug" => "craftopia"
            ],
            3 => [
                "id" => 75235,
                "cover" => [
                    "id" => 109855,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2crj.jpg"
                ],
                "first_release_date" => 1594944000,
                "hypes" => 117,
                "name" => "Ghost of Tsushima",
                "platforms" => [
                    0 => [
                        "id" => 48,
                        "abbreviation" => "PS4"
                    ]
                ],
                "rating" => 89.99592481551,
                "slug" => "ghost-of-tsushima"
            ],
            4 => [
                "id" => 100413,
                "cover" => [
                    "id" => 119926,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2kja.jpg"
                ],
                "first_release_date" => 1603929600,
                "hypes" => 93,
                "name" => "Watch Dogs: Legion",
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
                "slug" => "watch-dogs-legion"
            ],
            5 => [
                "id" => 119357,
                "cover" => [
                    "id" => 114059,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2g0b.jpg"
                ],
                "first_release_date" => 1606953600,
                "hypes" => 48,
                "name" => "Immortals Fenyx Rising",
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
                    ],
                    4 => [
                        "id" => 167,
                        "abbreviation" => "PS5"
                    ],
                    5 => [
                        "id" => 169,
                        "abbreviation" => "Series X"
                    ],
                    6 => [
                        "id" => 170,
                        "abbreviation" => "Stadia"
                    ]
                ],
                "slug" => "immortals-fenyx-rising"
            ],
            6 => [
                "id" => 79134,
                "cover" => [
                    "id" => 82162,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rea.jpg"
                ],
                "first_release_date" => 1608163200,
                "hypes" => 40,
                "name" => "Ancient Cities",
                "platforms" => [
                    0 => [
                        "id" => 6,
                        "abbreviation" => "PC"
                    ]
                ],
                "slug" => "ancient-cities"
            ],
            7 => [
                "id" => 119171,
                "cover" => [
                    "id" => 117335,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2ijb.jpg"
                ],
                "first_release_date" => 1601942400,
                "hypes" => 39,
                "name" => "Baldur's Gate 3",
                "platforms" => [
                    0 => [
                        "id" => 6,
                        "abbreviation" => "PC"
                    ],
                    1 => [
                        "id" => 14,
                        "abbreviation" => "Mac"
                    ],
                    2 => [
                        "id" => 170,
                        "abbreviation" => "Stadia"
                    ]
                ],
                "rating" => 82.228344872978,
                "slug" => "baldurs-gate-3"
            ],
            8 => [
                "id" => 103266,
                "cover" => [
                    "id" => 106377,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2a2x.jpg"
                ],
                "first_release_date" => 1606780800,
                "hypes" => 36,
                "name" => "Twin Mirror",
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
                    ]
                ],
                "slug" => "twin-mirror"
            ],
            9 => [
                "id" => 18375,
                "cover" => [
                    "id" => 70712,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1ik8.jpg"
                ],
                "first_release_date" => 1609372800,
                "hypes" => 34,
                "name" => "System Shock",
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
                    ]
                ],
                "slug" => "system-shock--1"
            ],
            10 => [
                "id" => 24863,
                "cover" => [
                    "id" => 101160,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2620.jpg"
                ],
                "first_release_date" => 1598572800,
                "hypes" => 29,
                "name" => "Wasteland 3",
                "platforms" => [
                    0 => [
                        "id" => 3,
                        "abbreviation" => "Linux"
                    ],
                    1 => [
                        "id" => 6,
                        "abbreviation" => "PC"
                    ],
                    2 => [
                        "id" => 14,
                        "abbreviation" => "Mac"
                    ],
                    3 => [
                        "id" => 48,
                        "abbreviation" => "PS4"
                    ],
                    4 => [
                        "id" => 49,
                        "abbreviation" => "XONE"
                    ]
                ],
                "rating" => 83.341346555223,
                "slug" => "wasteland-3"
            ],
            11 => [
                "id" => 25581,
                "cover" => [
                    "id" => 81472,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1qv4.jpg"
                ],
                "first_release_date" => 1598918400,
                "hypes" => 26,
                "name" => "Iron Harvest",
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
                    ]
                ],
                "slug" => "iron-harvest"
            ]


        ]);
    }
}
