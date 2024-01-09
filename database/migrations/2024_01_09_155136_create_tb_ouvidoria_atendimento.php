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
        Schema::create('tb_ouvidoria_atendimento', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->nullable();
            $table->string('situacao')->nullable();
            $table->string('codigo')->nullable();
            $table->string('sigilo')->nullable();
            $table->string('finalidade')->nullable();
            $table->dateTime('data_criacao')->nullable();
            $table->string('assunto')->nullable();
            $table->string('mensagem')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ouvidoria_atendimento');
    }
};
