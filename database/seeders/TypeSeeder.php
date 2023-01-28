<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::truncate();

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
