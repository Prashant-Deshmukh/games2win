<?php

use Illuminate\Database\Seeder;
use App\Game;
class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'International Fashion Stylist',
                'category' => 'fashion',
                'paid' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Star Fashion Designer',
                'category' => 'fashion',
                'paid' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Indian Fashion Stylist',
                'category' => 'fashion',
                'paid' => 0,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        Game::insert($data);
    }
}
