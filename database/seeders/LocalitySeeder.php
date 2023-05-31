<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Locality;




class LocalitySeeder extends Seeder
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
        Locality::truncate();

        //Réactiver les clefs
        Schema::enableForeignKeyConstraints();


        $localities = [
            ['postal_code'=>'1050',
            'locality'=>'Ixelles',
            ],
            ['postal_code'=>'1000',
            'locality'=>'Bruxelles',
            ],
            ['postal_code'=>'1080',
            'locality'=>'Molenbeek',
            ],
            ['postal_code'=>'1070',
            'locality'=>'Anderlecht',
            ],
           
        ];
        //Insert data in the table
        DB::table('localities')->insert($localities);
    }
}
