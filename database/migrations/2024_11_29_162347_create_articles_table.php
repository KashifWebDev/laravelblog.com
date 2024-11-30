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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('url', 500);
            $table->string('title', 500);
            $table->longText('content');
            $table->string('canonical_url', 500)->nullable();
            $table->string('og_title', 500)->nullable();
            $table->string('og_type', 500)->nullable();
            $table->string('og_site_name', 500)->nullable();
            $table->string('og_image', 500)->nullable(); // Path to locally stored image
            $table->string('og_url', 500)->nullable();
            $table->string('twitter_title', 500)->nullable();
            $table->string('twitter_image', 500)->nullable();
            $table->string('duration', 500)->nullable();
            $table->string('word_count', 500)->nullable();
            $table->integer('views')->default(0);
            $table->string('source');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
