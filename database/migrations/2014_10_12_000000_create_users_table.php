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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('image',300)->nullable();
            $table->tinyInteger('account_status')->default(1)->comment('1 = active; 2 = deactivate');
            $table->tinyInteger('can_submit_journal')->default(1)->comment('1 = no; 2 = yes');
            $table->text('account_message')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('verification_code');
            $table->string('password');
            $table->string('random_url',120);
            $table->timestamp('sent_time')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
