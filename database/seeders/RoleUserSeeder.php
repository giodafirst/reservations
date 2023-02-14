<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class RoleUserSeeder extends Seeder
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
        DB::table('role_user')->truncate();

        //Réactiver les clefs
        Schema::enableForeignKeyConstraints();

        //Define data
        $roleUsers = [
            [
                'user_firstname'=>'Bob',
                'user_lastname'=>'Sull',
                'role'=>'admin',
            ],
            [
                'user_firstname'=>'Anna',
                'user_lastname'=>'Lyse',
                'role'=>'membre',
            ],
        ];
        //Prepare the data
        foreach ( $roleUsers as &$data){
            //Search the user for a given user's firstname and lastname 
            $user = User::where([
                ['firstname','=',$data['user_firstname']],
                ['lastname','=',$data['user_lastname']],
            ])->first();
    
            //Search the role for a given role
            $role = Role::firstWhere('role', $data['role']);
            unset($data['user_firstname']);
            unset($data['user_lastname']);
            unset($data['role']);
    
    
            $data['role_id'] = $role->id;
            $data['user_id'] = $user->id; 
            }
    
            unset ($data);
    
            DB::table('role_user')->insert($roleUsers);
    }
}
