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
        Schema::create('tb_ouvidoria_resposta', function (Blueprint $table) {
            $table->id();

            $table->integer('id_atendimento')->nullable();
            $table->text('nova_mensagem')->nullable();
            $table->string('novo_arquivo')->nullable();
            $table->string('autor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ouvidoria_resposta');
    }
};
