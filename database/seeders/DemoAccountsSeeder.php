<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DemoAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Vérifie si les comptes démo existent déjà
        $demoEmails = ['demo.censeur@example.com', 'demo.eleve@example.com', 'demo.professeur@example.com'];
        
        // Supprime les anciens comptes démo s'ils existent
        DB::table('users')->whereIn('email', $demoEmails)->delete();
        
        // Insère les nouveaux comptes démo
        DB::table('users')->insert([
            [
                'name' => 'Compte Démo Censeur',
                'email' => 'demo.censeur@example.com',
                'password' => Hash::make('demo123'),
                'user_type' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Compte Démo Élève',
                'email' => 'demo.eleve@example.com',
                'password' => Hash::make('demo123'),
                'user_type' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Compte Démo Professeur',
                'email' => 'demo.professeur@example.com',
                'password' => Hash::make('demo123'),
                'user_type' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
