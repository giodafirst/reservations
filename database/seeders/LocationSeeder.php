<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Locality;
use App\Models\Location;
use Illuminate\Support\Facades\Schema;


class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //Désactiver les contraintes d'intégrité
         Schema::disableForeignKeyConstraints();

         //Empty the table first
         Location::truncate();
 
         //Réactiver les clefs
         Schema::enableForeignKeyConstraints();
        //Define data
        $locations = [
            [
                'slug'=>null,
                'designation'=>'Dexia Art Center',
                'address'=>'50 rue de l\'Ecuyer',
                'locality_postal_code'=>'1000',
                'website'=> null,
                'phone'=>null,
            ],
            [
                'slug'=>null,
                'designation'=>'La Samaritaine',
                'address'=>'16 rue de la Samaritaine',
                'locality_postal_code'=>'1000',
                'website'=> 'https://www.lasamaritaine.be',
                'phone'=>null,
            ],
            [
                'slug'=>null,
                'designation'=>'Espace Magh',
                'address'=>'17 rue du Poinçon',
                'locality_postal_code'=>'1000',
                'website'=> 'https://www.espacemagh.be',
                'phone'=>'+32(0)2/274.05.10',
            ],
        ];

        //Insert data in the table
        foreach ( $locations as &$data){
            //Recherche de la localité correspondant au code postal
            $locality = Locality::firstWhere('postal_code',$data['locality_postal_code']);
            unset($data['locality_postal_code']);

            $data['slug'] = Str::slug($data['designation'],'-');
            $data['locality_id'] = $locality->id; //Référenceà la table localities 
        }
        DB::table('locations')->insert($locations);


    }
}
