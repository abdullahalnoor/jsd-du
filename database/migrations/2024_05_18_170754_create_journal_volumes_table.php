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
        Schema::create('journal_volumes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journal_year_id')->nullable();
            $table->string('volume_no');
            // $table->string('title')->nullable();
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
        Schema::dropIfExists('journal_volumes');
    }
};