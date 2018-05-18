<?php

use Illuminate\Database\Seeder;
class ScoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $scores = [
            '0' => [
                'name' => 'Beyman',
                'score' => 132
            ],
            '1' => [
                'name' => 'Jhoan',
                'score' => 123
            ],
            '2' => [
                'name' => 'Victor',
                'score' => 134
            ]
        ];

        DB::table('scores')->insert($scores);

    }
}
