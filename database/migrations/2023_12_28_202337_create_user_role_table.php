<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_role', function (Blueprint $table) {

                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('role_id');
                
 
             //FOREIGN KEY CONSTRAINTS
             $table->foreign('user_id')->references('id')->onUpdate('cascade')->on('users')->onDelete('cascade');
             $table->foreign('role_id')->references('id')->onUpdate('cascade')->on('roles')->onDelete('cascade');
           
             //SETTING THE PRIMARY KEYS
             $table->primary(['user_id','role_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role');
    }
};