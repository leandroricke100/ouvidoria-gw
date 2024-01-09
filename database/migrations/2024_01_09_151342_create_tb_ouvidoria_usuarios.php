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
        Schema::create('tb_ouvidoria_usuarios', function (Blueprint $table) {
            $table->id();

            $table->string('pessoa_fisica')->nullable();
            $table->string('pessoa_juridica')->nullable();
            $table->string('sem_sigilo')->nullable();
            $table->string('sigilo')->nullable();
            $table->string('nome_completo')->nullable();
            $table->string('cpf')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->integer('data_nascimento')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('sexo')->nullable();
            $table->integer('cep')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('senha')->nullable();
            $table->string('confirmar_senha')->nullable();
            $table->string('tipo')->nullable();
            $table->string('prioridade')->nullable();
            $table->string('assunto')->nullable();
            $table->text('mensagem')->nullable();
            $table->string('arquivo')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ouvidoria_usuarios');
    }
};
