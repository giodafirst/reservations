<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Artist;
use Illuminate\Support\Facades\Schema;
use Faker\Factory as Faker;




class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $artists = [];
         //Désactiver les contraintes d'intégrité
         Schema::disableForeignKeyConstraints();

         //Empty the table first
         Artist::truncate();
 
         //Réactiver les clefs
         Schema::enableForeignKeyConstraints();

         //Define data
         foreach(range(1,50) as $index){
            $artists[] = [
                'firstname' => $faker->firstname,
                'lastname' => $faker->lastname,
            ];
        }
        
        //Insert data in the table
        DB::table('artists')->insert($artists);
    }
}
