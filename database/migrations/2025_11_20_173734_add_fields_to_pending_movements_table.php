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
        Schema::table('pending_movements', function (Blueprint $table) {
            // Adicionar campos faltantes
            $table->string('responsible')->after('quantity');
            $table->string('purpose')->after('responsible');
            $table->string('photo_path')->nullable()->after('notes');
            $table->timestamp('expires_at')->nullable()->after('token');

        });
    }

    public function down(): void
    {
        Schema::table('pending_movements', function (Blueprint $table) {
            $table->dropColumn(['responsible', 'purpose', 'photo_path', 'expires_at']);
        });
    }
};
