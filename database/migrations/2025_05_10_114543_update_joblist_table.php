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
        Schema::table("joblist", function (Blueprint $table){
            $table->string("currency")->nullable()->after("image");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("joblist", function (Blueprint $table){
            $table->dropColumn("currency")->nullable()->after("image");
        });
    }
};
