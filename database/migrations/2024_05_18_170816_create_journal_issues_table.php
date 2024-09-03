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
        Schema::create('journal_issues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('journal_volume_id')->nullable();
            $table->string('issue_no');
            $table->string('page_no')->nullable();
            $table->string('title')->nullable();
            $table->date('publish_date')->nullable();
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
        Schema::dropIfExists('journal_issues');
    }
};
