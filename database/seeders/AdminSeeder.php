<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nom' => 'Adeyemi',
            'prenom' => 'Houzeifa',
            'email' => 'admin@gmail.com',
            'telephone' => '0505050505',
            'sexe' => 'Homme',
            'adresse' => 'Port Bouët',
            'statut' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
    }
}