<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Show;
use App\Models\Location;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Empty the table first
        Show::truncate();

        //Define data
        $shows = [
            [
                'slug' => null,
                'title' => '3 hommes et un couffin',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie viverra neque suscipit mattis. Sed ultrices a tortor sit amet bibendum. Phasellus nunc tortor, sagittis vel neque nec, aliquet fringilla enim. Sed sit amet tellus tempor, venenatis dolor eget, feugiat quam. Donec auctor dolor eu magna euismod, eu congue erat porttitor. Curabitur arcu massa, pellentesque in dapibus sed, varius eget ipsum. Fusce tempor rhoncus ligula ut pellentesque.',
                'poster_url' => null,
                'location_slug' => 'la-samaritaine',
                'bookable'=>true,
                'price' => 24.99,

            ],
            [
                'slug' => null,
                'title' => 'Scarface',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie viverra neque suscipit mattis. Sed ultrices a tortor sit amet bibendum. Phasellus nunc tortor, sagittis vel neque nec, aliquet fringilla enim. Sed sit amet tellus tempor, venenatis dolor eget, feugiat quam. Donec auctor dolor eu magna euismod, eu congue erat porttitor. Curabitur arcu massa, pellentesque in dapibus sed, varius eget ipsum. Fusce tempor rhoncus ligula ut pellentesque.',
                'poster_url' => null,
                'location_slug' => 'dexia-art-center',
                'bookable'=>true,
                'price' => 24.99,

            ],
            [
                'slug' => null,
                'title' => 'Oscar',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi molestie viverra neque suscipit mattis. Sed ultrices a tortor sit amet bibendum. Phasellus nunc tortor, sagittis vel neque nec, aliquet fringilla enim. Sed sit amet tellus tempor, venenatis dolor eget, feugiat quam. Donec auctor dolor eu magna euismod, eu congue erat porttitor. Curabitur arcu massa, pellentesque in dapibus sed, varius eget ipsum. Fusce tempor rhoncus ligula ut pellentesque.',
                'poster_url' => null,
                'location_slug' => 'espace-magh',
                'bookable'=>false,
                'price' => 24.99,

            ],

        ];

        //Insert data in the table
        foreach ( $shows as &$data){
            //Recherche de la location 
            $location = Location::firstWhere('slug',$data['location_slug']);
            unset($data['location_slug']);

            $data['slug'] = Str::slug($data['title'],'-');
            $data['location_id'] = $location->id ?? null; //Référence à la table localities 
        }
        DB::table('shows')->insert($shows);
    }
}
