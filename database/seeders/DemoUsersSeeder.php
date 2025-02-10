<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DemoUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->where('email', 'demo.censeur@example.com')->update(['is_demo' => true]);
        DB::table('users')->where('email', 'demo.professeur@example.com')->update(['is_demo' => true]);
        DB::table('users')->where('email', 'demo.eleve@example.com')->update(['is_demo' => true]);
    }
}
