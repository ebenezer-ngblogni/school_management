<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weeks = [
            ['id' => 1, 'name' => 'Lundi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Mardi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Mercredi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Jeudi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'name' => 'Vendredi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'name' => 'Samedi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'name' => 'Dimanche', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('week')->insert($weeks);
    }
}
