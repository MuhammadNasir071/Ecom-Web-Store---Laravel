<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivacyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('privacy')->insert([
            [
                'name' => 'Family',
                'slug' => 'family',
                'is_active' => ('1'),
                'parent_id' => null,
                'level' => ('0'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Co-workers',
                'slug' => 'co-workers',
                'is_active' => ('1'),
                'parent_id' => null,
                'level' => ('0'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Friend',
                'slug' => 'friend',
                'is_active' => ('1'),
                'parent_id' => null,
                'level' => ('0'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Other',
                'slug' => 'other',
                'is_active' => ('1'),
                'parent_id' => null,
                'level' => ('0'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
              
            // Child Privacy of Parent Family
            [
                'name' => 'Mom',
                'slug' => 'mom',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dad',
                'slug' => 'dad',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Wife',
                'slug' => 'wife',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hasband',
                'slug' => 'hasband',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Child',
                'slug' => 'child',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grand Mother',
                'slug' => 'grand-mother',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Grand Father',
                'slug' => 'grand-father',
                'parent_id' => ('1'),
                'is_active' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Son',
                'slug' => 'son',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Daughter',
                'slug' => 'daughter',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Brother',
                'slug' => 'brother',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sister',
                'slug' => 'sister',
                'is_active' => ('1'),
                'parent_id' => 1,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],

             // Child Privacy of Parent Co-worker
             [
                'name' => 'Teen Female',
                'slug' => 'teen-female',
                'is_active' => ('1'),
                'parent_id' => 2,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teen Male',
                'slug' => 'teen-male',
                'is_active' => ('1'),
                'parent_id' => 2,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],

             // Child Privacy of Parent Frind
            [
                'name' => 'Friend Male',
                'slug' => 'friend-male',
                'is_active' => ('1'),
                'parent_id' => 3,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Friend Female',
                'slug' => 'friend-female',
                'is_active' => ('1'),
                'parent_id' => 3,
                'level' => ('1'),
                'user_id' => '0455d22e-8ddd-45c4-9b9f-6a09a36ad61d',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
