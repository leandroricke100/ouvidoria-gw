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
            $table->string('razao_social')->nullable()->after('nome_completo');
        });

        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {
            $table->string('cnpj')->nullable()->after('razao_social');
        });

        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {
            $table->string('nome_responsavel')->nullable()->after('cnpj');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {
            $table->dropColumn('razao_social')->nullable()->after('nome_completo');
        });

        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {
            $table->dropColumn('cnpj')->nullable()->after('razao_social');
        });

        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {
            $table->dropColumn('nome_responsavel')->nullable()->after('cnpj');
        });
    }
};
