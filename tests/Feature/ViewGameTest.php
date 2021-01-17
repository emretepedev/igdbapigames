<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewGameTest extends TestCase {

    /** @test */
    public function the_game_page_shows_correct_game_info()
    {
        Http::fake([
            'https://api.igdb.com/v4/games' => $this->fakeSingleGame(),
        ]);

        $response = $this->get(route('games.show', 'fake-craftopia'));

        $response->assertSuccessful();
        $response->assertSee('Fake Craftopia');
        $response->assertSee('74');
        $response->assertSee('Role-playing (RPG)');
        $response->assertSee("Hack and slash/Beat 'em up");
        $response->assertSee('Indie');
        $response->assertSee('POCKET PAIR');
        $response->assertSee('PC');
        $response->assertSee('https://store.steampowered.com/app/1307550/Craftopia/');
        $response->assertSee('sc8ac2');
        $response->assertSee('sc8ac3');
        $response->assertSee('sc8ac4');
        $response->assertSee('sc8ac5');
        $response->assertSee('sc8ac6');
        $response->assertSee('Star Control: Origins');
        $response->assertSee('Citadel: Forged With Fire');
        $response->assertSee('Omensight');
        $response->assertSee('Mr. Prepper');
        $response->assertSee('Eternity: The Last Unicorn');
        $response->assertSee('Remnant: From the Ashes');
        $response->assertSee('Gene Rain');
        $response->assertSee('Apsulov: End of Gods');
        $response->assertSee('Hytale');

    }

    private function fakeSingleGame()
    {
        return Http::response([
            0 => [
                "id" => 124448,
                "cover" => [
                    "id" => 104257,
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co28g1.jpg"
                ],
                "first_release_date" => 1599177600,
                "genres" => [
                    0 => [
                        "id" => 12,
                        "name" => "Role-playing (RPG)"
                    ],
                    1 => [
                        "id" => 25,
                        "name" => "Hack and slash/Beat 'em up"
                    ],
                    2 => [
                        "id" => 31,
                        "name" => "Adventure"
                    ],
                    3 => [
                        "id" => 32,
                        "name" => "Indie"
                    ]
                ],
                "hypes" => 133,
                "involved_companies" => [
                    0 => [
                        "id" => 100456,
                        "company" => [
                            "id" => 25939,
                            "name" => "POCKET PAIR"
                        ]
                    ]
                ],
                "name" => "Fake Craftopia",
                "platforms" => [
                    0 => [
                        "id" => 6,
                        "abbreviation" => "PC"
                    ]
                ],
                "rating" => 73.97210430564,
                "screenshots" => [
                    0 => [
                        "id" => 386642,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 124448,
                        "height" => 1080,
                        "image_id" => "sc8ac2",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8ac2.jpg",
                        "width" => 1920,
                        "checksum" => "89cc3dae-5697-0a6f-1d7c-221cd9a361ff"
                    ],
                    1 => [
                        "id" => 386643,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 124448,
                        "height" => 1080,
                        "image_id" => "sc8ac3",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8ac3.jpg",
                        "width" => 1920,
                        "checksum" => "2e97ded3-ad0c-3337-2dd6-b38c125900c3"
                    ],
                    2 => [
                        "id" => 386644,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 124448,
                        "height" => 1080,
                        "image_id" => "sc8ac4",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8ac4.jpg",
                        "width" => 1920,
                        "checksum" => "0b391266-965d-421b-aa56-f4c38a11daa4"
                    ],
                    3 => [
                        "id" => 386645,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 124448,
                        "height" => 1080,
                        "image_id" => "sc8ac5",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8ac5.jpg",
                        "width" => 1920,
                        "checksum" => "7643cec7-2896-3a2c-faa1-7ef2ce98d48d"
                    ],
                    4 => [
                        "id" => 386646,
                        "alpha_channel" => false,
                        "animated" => false,
                        "game" => 124448,
                        "height" => 1080,
                        "image_id" => "sc8ac6",
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8ac6.jpg",
                        "width" => 1920,
                        "checksum" => "f19c41a6-9d7a-71bb-d7b3-3a0f19e9bcb5"
                    ]
                ],
                "similar_games" => [
                    0 => [
                        "id" => 25311,
                        "cover" => [
                            "id" => 68395,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/rmzcpsfvnizymkhvd0qg.jpg"
                        ],
                        "name" => "Star Control: Origins",
                        "platforms" => [
                            0 => [
                                "id" => 6,
                                "abbreviation" => "PC"
                            ]
                        ],
                        "rating" => 79.766252739226,
                        "slug" => "star-control-origins"
                    ],
                    1 => [
                        "id" => 47823,
                        "cover" => [
                            "id" => 76951,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1ndj.jpg"
                        ],
                        "name" => "Citadel: Forged With Fire",
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
                        "rating" => 50.0,
                        "slug" => "citadel-forged-with-fire"
                    ],
                    2 => [
                        "id" => 80916,
                        "cover" => [
                            "id" => 67256,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/fq2ekyx6ac8em4lpv3zj.jpg"
                        ],
                        "name" => "Omensight",
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
                        ],
                        "rating" => 79.725112617475,
                        "slug" => "omensight"
                    ],
                    3 => [
                        "id" => 81680,
                        "cover" => [
                            "id" => 74570,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1lje.jpg"
                        ],
                        "name" => "Mr. Prepper",
                        "platforms" => [
                            0 => [
                                "id" => 6,
                                "abbreviation" => "PC"
                            ]
                        ],
                        "slug" => "mr-prepper"
                    ],
                    4 => [
                        "id" => 96217,
                        "cover" => [
                            "id" => 72919,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1k9j.jpg"
                        ],
                        "name" => "Eternity: The Last Unicorn",
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
                        "rating" => 60.0,
                        "slug" => "eternity-the-last-unicorn"
                    ],
                    5 => [
                        "id" => 105049,
                        "cover" => [
                            "id" => 75344,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1m4w.jpg"
                        ],
                        "name" => "Remnant: From the Ashes",
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
                        "rating" => 77.800076704569,
                        "slug" => "remnant-from-the-ashes"
                    ],
                    6 => [
                        "id" => 105269,
                        "cover" => [
                            "id" => 82218,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rfu.jpg"
                        ],
                        "name" => "Gene Rain",
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
                        "slug" => "gene-rain"
                    ],
                    7 => [
                        "id" => 111130,
                        "cover" => [
                            "id" => 68904,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1h60.jpg"
                        ],
                        "name" => "Apsulov: End of Gods",
                        "platforms" => [
                            0 => [
                                "id" => 6,
                                "abbreviation" => "PC"
                            ]
                        ],
                        "rating" => 63.7832017229,
                        "slug" => "apsulov-end-of-gods"
                    ],
                    8 => [
                        "id" => 113360,
                        "cover" => [
                            "id" => 81869,
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1r65.jpg"
                        ],
                        "name" => "Hytale",
                        "platforms" => [
                            0 => [
                                "id" => 6,
                                "abbreviation" => "PC"
                            ],
                            1 => [
                                "id" => 14,
                                "abbreviation" => "Mac"
                            ]
                        ],
                        "slug" => "hytale"
                    ]
                ],
                "slug" => "fake-craftopia",
                "summary" => "Craftopia is a game where you can do anything you've ever dreamed of. Thousands of items are categorized by the three eras: Primitive Era, Dragonic Era, Celestial Era. As you progress the game, more items will be available for you to craft!",
                "videos" => [
                    0 => [
                        "id" => 36861,
                        "game" => 124448,
                        "name" => "Trailer",
                        "video_id" => "kVOXW2YQ_Q4",
                        "checksum" => "cd6f1072-2624-c797-54e2-11b820c7dead"
                    ],
                    1 => [
                        "id" => 36862,
                        "game" => 124448,
                        "name" => "Trailer",
                        "video_id" => "MCrOGclnXCk",
                        "checksum" => "5742715a-35c3-0b89-10b4-53feefc239cc"
                    ]
                ],
                "websites" => [
                    0 => [
                        "id" => 142375,
                        "category" => 13,
                        "game" => 124448,
                        "trusted" => true,
                        "url" => "https://store.steampowered.com/app/1307550/Craftopia/",
                        "checksum" => "c6e30699-688d-ba9b-a8ee-0c80d5cbf611"
                    ]
                ]
            ]
        ]);
    }
}
