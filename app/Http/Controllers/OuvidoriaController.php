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

        $user->complemento = $dadosForm['complemento'];
        $user->assunto = $dadosForm['assunto'];
        $user->telefone = $dadosForm['telefone'];
        $user->cep = $dadosForm['cep'];

        $user->confirmar_senha = $dadosForm['confirmarSenha'];
        //$user->data_nascimento = $dadosForm['dataNascimento'];
        $user->celular = $dadosForm['celular'];
        $user->email = $dadosForm['email'];
        $user->endereco = $dadosForm['endereco'];
        $user->estado_civil = $dadosForm['estadoCivil'];
        $user->mensagem = $dadosForm['mensagem'];
        $user->nacionalidade = $dadosForm['nacionalidade'];
        $user->prioridade = $dadosForm['prioridade'];
        $user->senha = $dadosForm['senha'];
        $user->sexo = $dadosForm['sexo'];
        $user->tipo = $dadosForm['tipo'];
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

        $usuario = OuvidoriaUsuario::find(29);


        // É OBRIGATÓRIO RETORNAR ALGUMA COISA
        $retorno = [
            'data' => $dadosForm,
            'user' => $usuario,
        ];
        //return response()->json($retorno);

        return view('homepage', $retorno);


        //     $arrayTeste = [
        //         'nome' => '123',
        //         'aaaa' => $atendimento,
        //         'respostas' => $password,
        //         'lalala' => 'askdklasdkasdkj',
        //         'abacate' => $usuarios,
        //     ];

        //     return view('homepage', $arrayTeste);
        // }


        // public function atendimento(Request $request, $id)
        // {
        //     $atendimento = OuvidoriaAtendimento::find($id);

        //     return view('atendimento', [
        //         'at' => $atendimento
        //     ]);
        // }
    }
}
