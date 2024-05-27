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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the navbar item');
            $table->string('url')->comment('URL of the navbar item');
            $table->string('class')->comment('Class to classify navbar items, e.g., main-menu, footer-menu');
            $table->unsignedBigInteger('parent_id')->nullable()->index()->comment('ID of the parent navbar item');
            $table->foreign('parent_id')->references('id')->on('menu_items')->onDelete('cascade');
            $table->integer('order')->default(0)->comment('Order of the navbar item');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
