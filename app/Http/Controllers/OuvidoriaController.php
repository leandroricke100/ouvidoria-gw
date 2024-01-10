<?php

namespace App\Http\Controllers;

use App\Models\OuvidoriaAtendimento;
use App\Models\OuvidoriaUsuario;
use Illuminate\Http\Request;

class OuvidoriaController extends Controller
{
    public function geral(Request $request)
    {
        // DADOS DO FORMULÁRIO
        $dadosForm = $request->all(); // <<<< ARRAY/OBJETO COM DADOS DO FORMULÁRIO

        // isso. Ta certo.

        // VALIDAÇÃO

        // $retorno = [
        //     'status' => false,
        //     'msg' => 'Preencha o nome!'
        // ];
        // return response()->json($retorno);

        $user = new OuvidoriaUsuario;

        // if ($dadosForm['solicitacao'] === 'semSigilo') {
        //     $user->sem_sigilo = 'semSigilo';
        // } else {
        //     $user->sigilo = $dadosForm['solicitacao'];
        // }

        if ($dadosForm['tipoCadastro'] === 'pessoaFisica') {
            $user->tipo_pessoa = 'pessoaFisica';
            $user->nome_completo = $dadosForm['nomeCompleto'];
            $user->cpf = $dadosForm['cpf'];
            $user->razao_social = '(NULL)';
            $user->cnpj = '(NULL)';
            $user->nome_responsavel = '(NULL)';
        } else {
            $user->razao_social = $dadosForm['razaoSocial'];
            $user->cnpj = $dadosForm['cnpj'];
            $user->nome_responsavel = $dadosForm['nomeResponsavel'];
            $user->nome_completo = '(NULL)';
            $user->cpf = '(NULL)';
        }




        $user->telefone = $dadosForm['telefone'];
        $user->celular = $dadosForm['celular'];
        $user->tipo_pessoa = $dadosForm['tipoCadastro'];
        $user->tipo_sigilo = $dadosForm['solicitacao'];
        $user->save();
        // CADASTRO

        // $atendimento = new OuvidoriaAtendimento;
        // $atendimento->ticket_number = 123;
        // $atendimento->save();

        // $retorno = [
        //     'status' => true,
        //     'msg' => 'Cadastro efetuado com sucesso!',
        //     'id' => $atendimento->id
        // ];
        // return response()->json($retorno);



        // É OBRIGATÓRIO RETORNAR ALGUMA COISA
        $retorno = [
            'data' => $dadosForm
        ];
        return response()->json($retorno);
    }
}
