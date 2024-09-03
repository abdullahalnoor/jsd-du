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
        Schema::create('journal_articles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journal_issue_id')->nullable();
            $table->string('page_no')->nullable();
            $table->string('title')->nullable();
            $table->string('doi_url')->nullable();

            $table->text('abstract')->nullable();
            $table->string('authors')->nullable();
            $table->string('keywords')->nullable();

            $table->string('pdf_file')->nullable();
        
            $table->integer('order_id')->nullable();
            $table->integer('download_count')->nullable();
            $table->integer('view_count')->nullable();
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
        Schema::dropIfExists('journal_articles');
    }
};
