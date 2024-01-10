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
        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {
            $table->string('nome_completo')->nullable()->after('id')->change();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {
            $table->string('nome_completo')->nullable()->after('tipo_sigilo')->change();
        });
    }
};
