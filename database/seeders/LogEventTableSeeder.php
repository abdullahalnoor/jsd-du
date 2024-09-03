<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\LogEvent;
use DB;

class LogEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('log_events')->insert([
            'name' => 'Create',
            'slug' => 'create',
        ]);
        DB::table('log_events')->insert([
            'name' => 'Update',
            'slug' => 'update',
        ]);
       
        DB::table('log_events')->insert([
            'name' => 'Move to Trash',
            'slug' => 'soft-delete',
        ]);
        DB::table('log_events')->insert([
            'name' => 'Restore Info',
            'slug' => 'soft-delete-restore',
        ]);
        DB::table('log_events')->insert([
            'name' => 'Delete',
            'slug' => 'delete',
        ]);


        DB::table('log_events')->insert([
            'name' => 'Login',
            'slug' => 'login',
        ]);

        DB::table('log_events')->insert([
            'name' => 'Logout',
            'slug' => 'logout',
        ]);

        DB::table('log_events')->insert([
            'name' => 'Update Password',
            'slug' => 'update-password',
        ]);

        DB::table('log_events')->insert([
            'name' => 'Reset Password Request',
            'slug' => 'reset-password-request',
        ]);


        DB::table('log_events')->insert([
            'name' => 'Reset Password',
            'slug' => 'reset-password',
        ]);


        DB::table('log_events')->insert([
            'name' => 'Account Activation/Deactivation',
            'slug' => 'account-permission',
        ]);

      


    }
}
