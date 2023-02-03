<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        User::truncate();

        //Define data
        $users = [
            [
                'login'=>'bob',
                'firstname'=>'Bob',
                'lastname'=>'Sull',
                'email'=>'bob@sull.com',
                'password'=>'12345678',
                'langue'=>'eng',
                'created_at'=>'',
                'role'=>'member',

            ],
            [
                'login'=>'anna',
                'firstname'=>'Anna',
                'lastname'=>'Lyse',
                'email'=>'anna.lyse@sull.com',
                'password'=>'12345678',
                'langue'=>'eng',
                'created_at'=>'',
                'role'=>'member',

            ],
        ];

        foreach ($users as &$user){
            $user['created_at'] = Carbon::now()->toDateTimeString();
            $user['password'] = Hash::make($user['password']);
        }

        //Insert data in the table
        DB::table('users')->insert($users);

    }
}
