<?php

namespace Database\Seeders;


use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Database clear
        UserRole::truncate();

        UserRole::create([
            'name' => 'super_admin',
            'serial' => '1',
            'slug' => 'super_admin',
            'created_at' => Carbon::now()->toDateTimeLocalString(),
        ]);
        UserRole::create([
            'name' => 'admin',
            'serial' => '2',
            'slug' => 'admin',
            'created_at' => Carbon::now()->toDateTimeLocalString(),
        ]);
        UserRole::create([
            'name' => 'modarator',
            'serial' => '3',
            'slug' => 'modarator',
            'created_at' => Carbon::now()->toDateTimeLocalString(),
        ]);
        UserRole::create([
            'name' => 'user',
            'serial' => '4',
            'slug' => 'user',
            'created_at' => Carbon::now()->toDateTimeLocalString(),
        ]);
        UserRole::create([
            'name' => 'subscriber',
            'serial' => '5',
            'slug' => 'subscriber',
            'created_at' => Carbon::now()->toDateTimeLocalString(),
        ]);
    }
}
