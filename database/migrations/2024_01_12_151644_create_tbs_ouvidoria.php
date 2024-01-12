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

        date_default_timezone_set('America/Sao_Paulo');

        Schema::create('tb_ouvidoria_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo')->nullable();
            $table->string('razao_social')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('nome_responsavel')->nullable();
            $table->string('tipo_pessoa')->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('sexo')->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('senha')->nullable();
            $table->string('confirmar_senha')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tb_ouvidoria_atendimento', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario')->nullable();
            $table->string('numero')->nullable();
            $table->integer('ano')->nullable();
            $table->string('situacao')->nullable();
            $table->string('codigo')->nullable();
            $table->tinyInteger('sigiloso')->default(0);
            $table->string('assunto')->nullable();
            $table->string('tipo')->nullable();
            $table->string('prioridade')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('tb_ouvidoria_mensagem', function (Blueprint $table) {
            $table->id();
            $table->integer('id_atendimento')->nullable();
            $table->text('mensagem')->nullable();
            $table->string('arquivo')->nullable();
            $table->string('autor')->nullable();
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
        Schema::dropIfExists('tb_ouvidoria_atendimento');
        Schema::dropIfExists('tb_ouvidoria_mensagem');
    }
};
