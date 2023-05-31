<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Representation;
use App\Models\Location;
use App\Models\Show;
use Illuminate\Support\Facades\Schema;



class RepresentationSeeder extends Seeder
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
        Representation::truncate();

        //Réactiver les clefs
        Schema::enableForeignKeyConstraints();

       //Define data
       $representations = [
            [
                'location_slug' => 'la-samaritaine',
                'show_slug' => '3-hommes-et-un-couffin',
                'when' => '2023-06-15 20:00',
            ],
            [
                'location_slug' => 'dexia-art-center',
                'show_slug' => 'scarface',
                'when' => '2023-06-14 20:00',
            ],
            [
                'location_slug' => 'espace-magh',
                'show_slug' => 'oscar',
                'when' => '2023-06-16 20:00',
            ],
        
            

        ];
        //Prepare the data
        foreach($representations as &$data){
            //Search the location for a given location's slug
            $location = Location::firstWhere('slug',$data['location_slug']);
            unset($data['location_slug']);

            //Search the show for a given show's slug
            $show = Show::firstWhere('slug',$data['show_slug']);
            unset($data['show_slug']);

            $data['location_id'] = $location->id ?? null;
            $data['show_id'] = $show->id;
        }
        unset($data);

        //Insert data in the table
        DB::table('representations')->insert($representations);


    }
}
