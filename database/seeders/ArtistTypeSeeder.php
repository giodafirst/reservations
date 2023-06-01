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

        $artists = Artist::all();

        if(count($artists)){
            foreach($artists as $artist){
                $artist; 
                $typesCount = count(Type::all());

                DB::table('artist_type')->insert([
                    'artist_id' => $artist->id, 
                    'type_id' => mt_rand(1, $typesCount), 
               ]);
           }
        }

    }
}
