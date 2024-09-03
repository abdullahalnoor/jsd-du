<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'name' => 'Mr Customer 1',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('customers')->insert([
            'name' => 'Mr Customer 2',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('customers')->insert([
            'name' => 'Mr Customer 3',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
    }
}
