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
        Schema::table('users', function (Blueprint $table) {
            $table->string('google_id')->nullable()->after('email');   // Google ID
            $table->string('facebook_id')->nullable()->after('google_id'); // Facebook ID
            $table->string('github_id')->nullable()->after('facebook_id'); // GitHub ID
            $table->string('twitter_id')->nullable()->after('github_id'); // Twitter ID
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['google_id', 'facebook_id', 'github_id', 'twitter_id']);
        });
    }
};
