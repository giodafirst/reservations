<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Representation;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class RepresentationUserSeeder extends Seeder
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
        DB::table('representation_user')->truncate();

        //Réactiver les clefs
        Schema::enableForeignKeyConstraints();

        //Define data
        $representationUsers = [
            [
                'user_firstname'=>'Bob',
                'user_lastname'=>'Sull',
                'representation'=>'1',
                'places'=>2,
            ],
            [
                'user_firstname'=>'Anna',
                'user_lastname'=>'Lyse',
                'representation'=>'2',
                'places'=>4,
            ],
            [
                'user_firstname'=>'Anna',
                'user_lastname'=>'Lyse',
                'representation'=>'3',
                'places'=>1,
            ],
        ];
        //Prepare the data
        foreach ( $representationUsers as &$data){
            //Search the user for a given user's firstname and lastname 
            $user = User::where([
                ['firstname','=',$data['user_firstname']],
                ['lastname','=',$data['user_lastname']],
            ])->first();
    
            //Search the representation for a given representation
            $representation = Representation::where([
                ['show_id','=',$data['representation']],
            ])->first();
            unset($data['user_firstname']);
            unset($data['user_lastname']);
            unset($data['representation']);
    
    
            $data['representation_id'] = $representation->id;
            $data['user_id'] = $user->id; 
            }
    
            unset ($data);
    
            DB::table('representation_user')->insert($representationUsers);
    }
}
