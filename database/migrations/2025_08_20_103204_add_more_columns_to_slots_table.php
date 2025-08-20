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
        Schema::table('slots', function (Blueprint $table) {
            $table->decimal("temperature", 6, 1)->nullable()->after("time");
            $table->integer("chance_of_rain")->nullable()->after("temperature");
            $table->decimal("wind_speed", 6, 1)->nullable()->after("chance_of_rain");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slots', function (Blueprint $table) {
            //
        });
    }
};
