<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = array(
            array(
                'question_id' => 1,
                'option_id' => 2,
                'created_at' => Carbon::now()
            ),
            array( 
                'question_id' => 2,
                'option_id' => 1,
                'created_at' => Carbon::now()
            ), 
            array( 
                'question_id' => 3,
                'option_id' => 1,
                'created_at' => Carbon::now()
            ), 
            array( 
                'question_id' => 4,
                'option_id' => 1,
                'created_at' => Carbon::now()
            ), 
            array( 
                'question_id' => 5,
                'option_id' => 1,
                'created_at' => Carbon::now()
            ), 
            array( 
                'question_id' => 6,
                'option_id' => 1,
                'created_at' => Carbon::now()
            ), 
            array( 
                'question_id' => 7,
                'option_id' => 1,
                'created_at' => Carbon::now()
            ), 
            array( 
                'question_id' => 8,
                'option_id' => 1,
                'created_at' => Carbon::now()
            ), 
            array( 
                'question_id' => 9,
                'option_id' => 1,
                'created_at' => Carbon::now()
            ), 
            array( 
                'question_id' => 10,
                'option_id' => 1,
                'created_at' => Carbon::now()
            ) 
        );
        DB::table('answers')->insert($questions);
    }
}
