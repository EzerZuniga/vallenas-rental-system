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
        Schema::table('maquinaria', function (Blueprint $table) {
            if (!Schema::hasColumn('maquinaria', 'proxima_mantenimiento')) {
                $table->timestamp('proxima_mantenimiento')->nullable()->after('mantenimientos');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('maquinaria', function (Blueprint $table) {
            if (Schema::hasColumn('maquinaria', 'proxima_mantenimiento')) {
                $table->dropColumn('proxima_mantenimiento');
            }
        });
    }
};
