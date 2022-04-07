<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         $this->call([
           JobSeeder::class,
           SubjectSeeder::class,
           LanguageSeeder::class,
           ServiceSeeder::class,
           FaqSeeder::class,
        ]);
    }
}
