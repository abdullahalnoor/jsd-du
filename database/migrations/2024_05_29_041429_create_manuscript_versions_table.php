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
        Schema::create('manuscript_versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manuscript_id');
            $table->integer('version_no');
            $table->text('abstract');
            $table->string('main_file');
            $table->timestamp('submitted_date')->useCurrent();
            $table->tinyInteger('approval_status')->comment('1=pending; 2=approved;
            3=resubmit; 4=rejected');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manuscript_versions');
    }
};
