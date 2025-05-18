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
        Schema::table('application', function (Blueprint $table) {
            $table->dropColumn('cover_letter');
            $table->text('cover_letter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application', function (Blueprint $table) {
            $table->dropColumn('cover_letter');
            $table->string('cover_letter')->nullable();
        });
    }
};
