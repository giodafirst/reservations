<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Artist;
use Illuminate\Support\Facades\Schema;



class ArtistSeeder extends Seeder
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
         Artist::truncate();
 
         //Réactiver les clefs
         Schema::enableForeignKeyConstraints();

        $artists = [
            ['firstname'=>'Daniel','lastname'=>'Marcelin'],
            ['firstname'=>'Philippe','lastname'=>'Laurent'],
            ['firstname'=>'Marius','lastname'=>'Von Mayenburg'],
            ['firstname'=>'Olivier','lastname'=>'Boudon'],
            ['firstname'=>'Anne','lastname'=>'Loop'],
            ['firstname'=>'Pietro','lastname'=>'Varasso'],
            ['firstname'=>'Laurent','lastname'=>'Caron'],
            ['firstname'=>'Elena','lastname'=>'Perez'],
            ['firstname'=>'Guillaume','lastname'=>'Alexandre'],
            ['firstname'=>'Claude ','lastname'=>'Semal'],
            ['firstname'=>'Laurence','lastname'=>'Warin'],
        ];
        //Insert data in the table
        DB::table('artists')->insert($artists);
    }
}
