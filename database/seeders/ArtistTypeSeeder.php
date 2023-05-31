<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ArtistType;
use App\Models\Artist;
use App\Models\Type;
use Illuminate\Support\Facades\Schema;


class ArtistTypeSeeder extends Seeder
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
        ArtistType::truncate();

        //Réactiver les clefs
        Schema::enableForeignKeyConstraints();

        //Define data
        $artistTypes = [
            [
                'artist_firstname' => 'Daniel',
                'artist_lastname' => 'Marcelin',
                'type' => 'metteur en scène',
            ],
            [
                'artist_firstname' => 'Philippe',
                'artist_lastname' => 'Laurent',
                'type' => 'acteur',
            ],
            [
                'artist_firstname' => 'Marius',
                'artist_lastname' => 'Von Mayenburg',
                'type' => 'acteur',
            ],
            [
                'artist_firstname' => 'Olivier',
                'artist_lastname' => 'Boudon',
                'type' => 'chanteur',
            ],
            [
                'artist_firstname' => 'Anne',
                'artist_lastname' => 'Loop',
                'type' => 'producteur',
            ],
            [
                'artist_firstname' => 'Pietro',
                'artist_lastname' => 'Varasso',
                'type' => 'technicien',
            ],
            [
                'artist_firstname' => 'Laurent',
                'artist_lastname' => 'Caron',
                'type' => 'technicien',
            ],
            [
                'artist_firstname' => 'Elena',
                'artist_lastname' => 'Perez',
                'type' => 'acteur',
            ],
            [
                'artist_firstname' => 'Guillaume',
                'artist_lastname' => 'Alexandre',
                'type' => 'acteur',
            ],
            [
                'artist_firstname' => 'Claude',
                'artist_lastname' => 'Semal',
                'type' => 'metteur en scène',
            ],
            [
                'artist_firstname' => 'Laurence',
                'artist_lastname' => 'Warin',
                'type' => 'acteur',
            ],
        ];
        //Prepare the data
        foreach ( $artistTypes as &$data){
            //Search the artist for a given artist's firstname and lastname
            $artist = Artist::where([
                ['firstname','=',$data['artist_firstname']],
                ['lastname','=',$data['artist_lastname']],
            ])->first();

            //Search the type for a given type
            $type = Type::firstWhere('type', $data['type']);
            unset($data['artist_firstname']);
            unset($data['artist_lastname']);
            unset($data['type']);


            $data['artist_id'] = $artist->id;
            $data['type_id'] = $type->id;
        }

        unset ($data);

        DB::table('artist_type')->insert($artistTypes);

    }
}
