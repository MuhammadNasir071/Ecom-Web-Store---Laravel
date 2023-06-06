<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CityTableSeeder04 extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $path = public_path('sql/cities4.sql');
        DB::unprepared(file_get_contents($path));
        $this->command->info('City table seeded!');

    }
}
