<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;
use Illuminate\Support\Facades\Schema;


class TypeSeeder extends Seeder
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
        Type::truncate();

        //Réactiver les clefs
        Schema::enableForeignKeyConstraints();

        $types = [
            ['type' => 'acteur'],
            ['type' => 'chanteur'],
            ['type' => 'producteur'],
            ['type' => 'metteur en scène'],
            ['type' => 'technicien'],
        ];

        DB::table('types')->insert($types);
    }
}
