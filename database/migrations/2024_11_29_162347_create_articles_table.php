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
            $table->string('url');
            $table->string('title');
            $table->text('content');
            $table->string('canonical_url')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_type')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('og_image')->nullable(); // Path to locally stored image
            $table->string('og_url')->nullable();
            $table->string('twitter_title')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('duration')->nullable();
            $table->string('word_count')->nullable();
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
