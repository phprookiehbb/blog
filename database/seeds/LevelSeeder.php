<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            [
                'id' => 1,
                'level' => 1,
                'fen'   => 200
            ],
            [
                'id' => 2,
                'level' => 2,
                'fen'   => 500
            ],
            [
                'id' => 3,
                'level' => 3,
                'fen'   => 800
            ],
            [
                'id' => 4,
                'level' => 4,
                'fen'   => 1500
            ]
        ]);
    }
}
