<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    private const COUNT = 10;
    private const OPTIONS = ['A', 'B', 'C', 'D'];
    private const CATEGORIES = ['technical', 'aptitude', 'logical'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [];
        $now = now();

        for ($i = 1; $i <= self::COUNT; $i++) {
            $questions[] = [
                'question' => "Please select the correct answer to question $i?",
                'category' => self::CATEGORIES[array_rand(self::CATEGORIES)],
                'answer'   => self::OPTIONS[array_rand(self::OPTIONS)],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('exam')->insert($questions);
    }
}
