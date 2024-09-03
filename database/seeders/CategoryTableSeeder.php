<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'Laptop',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);

        DB::table('categories')->insert([
            'name' => 'Mobile',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'image'=> \AppHelper::$defaultImage,
            'status' => 1,
        ]);

        DB::table('categories')->insert([
            'name' => 'Car',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
             'image'=> \AppHelper::$defaultImage,
        ]);

        DB::table('categories')->insert([
            'name' => 'Keyboard',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
             'image'=> \AppHelper::$defaultImage,
        ]);

        DB::table('categories')->insert([
            'name' => 'Mouse',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
             'image'=> \AppHelper::$defaultImage,
        ]);

        DB::table('categories')->insert([
            'name' => 'Camera',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
             'image'=> \AppHelper::$defaultImage,
        ]);

        DB::table('categories')->insert([
            'name' => 'Watch',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
             'image'=> \AppHelper::$defaultImage,
        ]);
    }
}
