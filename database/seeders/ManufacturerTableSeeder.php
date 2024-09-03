<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use DB;

class ManufacturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('manufacturers')->insert([
            'name' => 'Tesla',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
             'image'=> \AppHelper::$defaultImage,
        ]);

        DB::table('manufacturers')->insert([
            'name' => 'Apple',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
             'image'=> \AppHelper::$defaultImage,
        ]);

        DB::table('manufacturers')->insert([
            'name' => 'Dell',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
             'image'=> \AppHelper::$defaultImage,
        ]);

        DB::table('manufacturers')->insert([
            'name' => 'Nissan',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
             'image'=> \AppHelper::$defaultImage,
        ]);
    }
}
