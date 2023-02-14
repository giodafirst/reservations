<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Support\Facades\Schema;


class RoleSeeder extends Seeder
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
        Role::truncate();

        //Réactiver les clefs
        Schema::enableForeignKeyConstraints();

        $roles = [
            ['role' => 'membre'],
            ['role' => 'admin'],
        ];

        DB::table('roles')->insert($roles);
    }
}
