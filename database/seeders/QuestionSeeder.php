<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = array(
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'php',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Is PHP a case-sensitive scripting language?', 
                'type' => 'php',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'What is the meaning of PEAR in PHP?', 
                'type' => 'php',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'How is a PHP script executed?', 
                'type' => 'php',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'What are the types of variables present in PHP?', 
                'type' => 'php',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'php',
                'created_at' => Carbon::now()
            ),

            // ajax question add

            array(
                'text' => 'How do Synchronous and Asynchronous Requests differ?', 
                'type' => 'ajax',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'ajax',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'ajax',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'List advantages of using Ajax in web development', 
                'type' => 'ajax',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'ajax',
                'created_at' => Carbon::now()
            ),

            // jquery

            array(
                'text' => 'How do Synchronous and Asynchronous Requests differ?', 
                'type' => 'jquery',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'jquery',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'jquery',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'List advantages of using Ajax in web development', 
                'type' => 'jquery',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'jquery',
                'created_at' => Carbon::now()
            ),

            // html

            array(
                'text' => 'How do Synchronous and Asynchronous Requests differ?', 
                'type' => 'html',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'html',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'html',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'List advantages of using Ajax in web development', 
                'type' => 'html',
                'created_at' => Carbon::now()
            ),
            array(
                'text' => 'Differentiate between static and dynamic websites.', 
                'type' => 'html',
                'created_at' => Carbon::now()
            ),
        );
        DB::table('questions')->insert($questions);
    }
}
