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
        Schema::create('app_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('log_event_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('app_loggable_id');
            $table->string('app_loggable_type');

            $table->unsignedBigInteger('model_parent_id')->nullable();

            $table->string('log_name')->nullable();
            $table->text('log_text')->nullable();

            $table->string('request_url')->nullable();
            $table->string('request_method')->nullable();

            $table->string('user_agent')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('mac_address')->nullable();
           
            

            $table->string('device_type')->nullable();
            $table->string('browser_name')->nullable();
            $table->string('browser_family')->nullable();
            $table->string('platform_name')->nullable();
            $table->string('device_family')->nullable();
            $table->string('device_model')->nullable();

            $table->timestamp('created_at')->useCurrent();

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_logs');
    }
};
