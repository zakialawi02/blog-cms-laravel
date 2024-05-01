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
        Schema::create('web_setting', function (Blueprint $table) {
            $table->id();
            $table->string('web_name')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('email')->nullable();
            $table->string('link_fb')->nullable();
            $table->string('link_ig')->nullable();
            $table->string('link_youtube')->nullable();
            $table->string('link_twitter')->nullable();
            $table->string('link_linkedin')->nullable();
            $table->string('link_github')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
