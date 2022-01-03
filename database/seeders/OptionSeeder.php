<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [];
        $now = now();

        for ($i = 1; $i <= 10; $i++) {
            $questionOptions = array_map(fn ($option) => [
                'option' => $option,
                'text' => "Option $option for question $i",
                'question_id' => $i,
                'created_at' => $now,
                'updated_at' => $now,
            ], ['A', 'B', 'C', 'D']);

            array_push($options, ...$questionOptions);
        }

        DB::table('options')->insert($options);
    }
}
