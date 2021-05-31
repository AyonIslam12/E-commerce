<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Database clear
        User::truncate();

        User::create([
        'role_id'=> '1',
        'first_name'=> 'Mr.Super ',
        'last_name'=> 'Admin',
        'username'=> 'super_admin',
        'photo'=> 'ayon.jpg',
        'phone'=> '+880-1791205437',
        'address'=>'Dhaka,Bangladesh',
        'email'=>'superadmin@gmail.com',
        'password'=>Hash::make('12345678'),
        'slug'=>'super_admin',
        'created_at' => Carbon::now()->toDateTimeLocalString(),

        ]);
        User::create([
        'role_id'=> '2',
        'first_name'=> 'Mr.Main ',
        'last_name'=> 'Admin',
        'username'=> 'admin',
        'photo'=> 'ayon2.jpg',
        'phone'=> '+880-1791205437',
        'address'=>'Dhaka,Bangladesh',
        'email'=>'admin@gmail.com',
        'password'=>Hash::make('12345678'),
        'slug'=>'admin',
        'created_at' => Carbon::now()->toDateTimeLocalString(),

        ]);
        User::create([
        'role_id'=> '3',
        'first_name'=> 'Mr.Main ',
        'last_name'=> 'Modarator',
        'username'=> 'modarator',
        'photo'=> 'ayon1.jpg',
        'phone'=> '+880-1791205437',
        'address'=>'Dhaka,Bangladesh',
        'email'=>'modarator@gmail.com',
        'password'=>Hash::make('12345678'),
        'slug'=>'modarator',
        'created_at' => Carbon::now()->toDateTimeLocalString(),

        ]);
        User::create([
        'role_id'=> '4',
        'first_name'=> 'Mr.Mehedi ',
        'last_name'=> 'Hasan',
        'username'=> 'user',
        'photo'=> 'ayon3.jpg',
        'phone'=> '+880-1791205437',
        'address'=>'Dhaka,Bangladesh',
        'email'=>'user@gmail.com',
        'password'=>Hash::make('12345678'),
        'slug'=>'user',
        'created_at' => Carbon::now()->toDateTimeLocalString(),

        ]);
        User::create([
        'role_id'=> '5',
        'first_name'=> 'Mr.Main ',
        'last_name'=> 'Subscriber',
        'username'=> 'subscriber',
        'photo'=> 'mumu.jpg',
        'phone'=> '+880-1791205437',
        'address'=>'Dhaka,Bangladesh',
        'email'=>'subscriber@gmail.com',
        'password'=>Hash::make('12345678'),
        'slug'=>'subscriber',
        'created_at' => Carbon::now()->toDateTimeLocalString(),

        ]);


    }
}
