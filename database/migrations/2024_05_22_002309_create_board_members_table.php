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
        Schema::create('board_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_designation_id')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('affiliation')->nullable();
            
            $table->string('image')->nullable();
           
            $table->integer('order_id')->nullable();
            $table->tinyInteger('status')->default(1)
            ->nullable()->comment('	1 = Active ; 2 = Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board_members');
    }
};
