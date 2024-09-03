<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Product 1',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('products')->insert([
            'name' => 'Product 2',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('products')->insert([
            'name' => 'Product 3',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('products')->insert([
            'name' => 'Product 4',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('products')->insert([
            'name' => 'Product 5',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('products')->insert([
            'name' => 'Product 6',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('products')->insert([
            'name' => 'Product 7',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('products')->insert([
            'name' => 'Product 8',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('products')->insert([
            'name' => 'Product 9',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('products')->insert([
            'name' => 'Product 10',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
    }
}
