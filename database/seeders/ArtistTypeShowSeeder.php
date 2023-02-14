<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ArtistType;
use App\Models\Artist;
use App\Models\Type;
use App\Models\Show;
use Illuminate\Support\Facades\Schema;

class ArtistTypeShowSeeder extends Seeder
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
        DB::table('artist_type_show')->truncate();

        //Réactiver les clefs
        Schema::enableForeignKeyConstraints();

        //Define data
        $artistTypesShows = [
            [
                'artist_firstname'=>'Daniel',
                'artist_lastname'=>'Marcelin',
                'type'=>'metteur en scène',
                'show_slug'=>'3-hommes-et-un-couffin',
            ],
            [
                'artist_firstname' => 'Philippe',
                'artist_lastname' => 'Laurent',
                'type' => 'acteur',
                'show_slug'=>'3-hommes-et-un-couffin',

            ],
            [
                'artist_firstname' => 'Marius',
                'artist_lastname' => 'Von Mayenburg',
                'type' => 'acteur',
                'show_slug'=>'3-hommes-et-un-couffin',

            ],
            [
                'artist_firstname' => 'Olivier',
                'artist_lastname' => 'Boudon',
                'type' => 'chanteur',
                'show_slug'=>'3-hommes-et-un-couffin',

            ],
            [
                'artist_firstname' => 'Anne',
                'artist_lastname' => 'Loop',
                'type' => 'producteur',
                'show_slug'=>'scarface',
            ],
            [
                'artist_firstname' => 'Pietro',
                'artist_lastname' => 'Varasso',
                'type' => 'technicien',
                'show_slug'=>'scarface',
            ],
            [
                'artist_firstname' => 'Laurent',
                'artist_lastname' => 'Caron',
                'type' => 'technicien',
                'show_slug'=>'oscar',
            ],
            [
                'artist_firstname' => 'Elena',
                'artist_lastname' => 'Perez',
                'type' => 'acteur',
                'show_slug'=>'scarface',
            ],
            [
                'artist_firstname' => 'Guillaume',
                'artist_lastname' => 'Alexandre',
                'type' => 'acteur',
                'show_slug'=>'oscar',
            ],
            [
                'artist_firstname' => 'Claude',
                'artist_lastname' => 'Semal',
                'type' => 'metteur en scène',
                'show_slug'=>'oscar',
            ],
            [
                'artist_firstname' => 'Laurence',
                'artist_lastname' => 'Warin',
                'type' => 'acteur',
                'show_slug'=>'scarface',
            ],
        ];
        //Prepare the data
        foreach ( $artistTypesShows as &$data){
            //Search the artist for a given artist's firstname and lastname 
            $artist = Artist::where([
                ['firstname','=',$data['artist_firstname']],
                ['lastname','=',$data['artist_lastname']],
            ])->first();
    
            //Search the type for a given type
            $type = Type::firstWhere('type', $data['type']);

            //Search he artistType for the artist and type found
            $artistType = ArtistType::where([
                [
                    'artist_id','=',$artist->id
                ],
                [
                    'type_id','=',$type->id
                ],

            ])->first();

            //Search the show for a given show's slug
            $show = Show::firstWhere('slug',$data['show_slug']);

            unset($data['artist_firstname']);
            unset($data['artist_lastname']);
            unset($data['type']);
            unset($data['show_slug']);
    
    
            $data['artist_type_id'] = $artistType->id;
            $data['show_id'] = $show->id; 
            }
    
            unset ($data);
    
            DB::table('artist_type_show')->insert($artistTypesShows);
    }
}

