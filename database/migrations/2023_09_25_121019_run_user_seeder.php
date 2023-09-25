<?php

use Database\Seeders\AnswerSeeder;
use Database\Seeders\OptionSeeder;
use Database\Seeders\QuestionSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Migrations\Migration; 
use Illuminate\Support\Facades\Artisan; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Artisan::call('db:seed', [
            '--class' => UserSeeder::class,
        ]);

        Artisan::call('db:seed', [
            '--class' => QuestionSeeder::class,
        ]);

        Artisan::call('db:seed', [
            '--class' => OptionSeeder::class,
        ]);

        Artisan::call('db:seed', [
            '--class' => AnswerSeeder::class,
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
