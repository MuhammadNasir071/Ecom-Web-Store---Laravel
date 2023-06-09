<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CityTableSeeder02 extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('sql/cities2.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('City table seeded!');

    }
}
