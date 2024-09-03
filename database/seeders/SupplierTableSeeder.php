<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use DB;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            'name' => 'Mr Supplier 1',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('suppliers')->insert([
            'name' => 'Mr Supplier 2',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
        DB::table('suppliers')->insert([
            'name' => 'Mr Supplier 3',
            'user_id' => User::orderBy('id','asc')->first()['id'],
            'status' => 1,
            'image'=> \AppHelper::$defaultImage,
        ]);
    }
}
