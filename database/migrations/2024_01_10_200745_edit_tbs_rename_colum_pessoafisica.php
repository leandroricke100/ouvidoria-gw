<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\TableExtension;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Esse IF verifica se a coluna existe na tabela
        if (Schema::hasColumn('tb_ouvidoria_usuarios', 'pessoa_fisica')) {
            Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {
                $table->renameColumn('pessoa_fisica', 'tipo_pessoa');
            });
        }


        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {

            $table->renameColumn('sigilo', 'tipo_sigilo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {

            $table->renameColumn('tipo_pessoa', 'pessoa_fisica');
        });

        Schema::table('tb_ouvidoria_usuarios', function (Blueprint $table) {

            $table->renameColumn('tipo_sigilo', 'sigilo');
        });
    }
};
