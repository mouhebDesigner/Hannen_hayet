<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('materiels')->insert([
            [
                "nom" => "Mandat ordinaire_16",
                "quantite" => rand(10, 60),
                "categorie" => "papier"
            ],
            [
                "nom" => "CCP_86",
                "quantite" => rand(10, 60),
                "categorie" => "papier"
            ],
            [
                "nom" => "Mandat minute_12",
                "quantite" => rand(10, 60),
                "categorie" => "papier"
            ],
            [
                "nom" => "Western union",
                "quantite" => rand(10, 60),
                "categorie" => "papier"
            ],
            [
                "nom" => "Moneygram",
                "quantite" => rand(10, 60),
                "categorie" => "papier"
            ],
            [
                "nom" => "Demande de retrait",
                "quantite" => rand(10, 60),
                "categorie" => "papier"
            ],
            [
                "nom" => "Déclaration de versement",
                "quantite" => rand(10, 60),
                "categorie" => "papier"
            ],
            [
                "nom" => "",
                "quantite" => rand(10, 60),
                "categorie" => "papier"
            ],

        ]);

        DB::table('users')->insert([
            [
                "name" => "directeur",
                "email" => "directeur@gmail.com",
                "password" => Hash::make('adminadmin'),
                "numtel" => "22000111",
                "grade" => "directeur"
            ],
            
            [
                "name" => "responsable",
                "email" => "responsable@gmail.com",
                "password" => Hash::make('adminadmin'),
                "numtel" => "22000112",
                "grade" => "responsable"
            ],

        ]);
    }
}
