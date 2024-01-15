<?php

namespace App\Http\Controllers;

use App\Helper\FileHelper;
use App\Models\OuvidoriaAtendimento;
use App\Models\OuvidoriaMensagem;
use App\Models\OuvidoriaUsuario;
use Illuminate\Http\Request;

class OuvidoriaController extends Controller
{


    public function geral(Request $request)
    {
        $dadosForm = $request->all();

        // UPLOAD DO ARQUIVO
        $nome_arquivo = null;
        if ($request->file('arquivo')) {
            $FileHelper = new FileHelper;
            $infoAnexoImg = $FileHelper->upload([
                'file' => $request->file('arquivo'),
                'pasta' => 'ouvidoria/arquivos',
                'nome' => 'Arquivo Ouvidoria',
                'observacao' => '',
                'temporario' => false,
                'restrito' => true,
            ]);
            $nome_arquivo = $infoAnexoImg['status'] ? $infoAnexoImg['nome_arquivo'] : null;

            if (!$infoAnexoImg['status']) return ['status' => false, 'msg' => 'Falha no upload do arquivo.', 'retorno' => $infoAnexoImg];
        }

        // CADASTRO DO USUÁRIO
        $user = new OuvidoriaUsuario;
        if ($dadosForm['tipoCadastro'] === 'pessoaFisica') {
            $user->tipo_pessoa = 'pessoaFisica';
            $user->nome_completo = $dadosForm['nomeCompleto'];
            $user->cpf = $dadosForm['cpf'];
            $user->razao_social = NULL;
            $user->cnpj = NULL;
            $user->nome_responsavel = NULL;
        } else {
            $user->razao_social = $dadosForm['razaoSocial'];
            $user->tipo_pessoa = 'pessoaJuridica';
            $user->cnpj = $dadosForm['cnpj'];
            $user->nome_responsavel = $dadosForm['nomeResponsavel'];
            $user->nome_completo = NULL;
            $user->cpf = NULL;
        }

        $user->complemento = $dadosForm['complemento'];
        $user->cep = intval($dadosForm['cep']);
        $user->senha = $dadosForm['senha'];
        $user->confirmar_senha = $dadosForm['confirmarSenha'];
        $user->data_nascimento = $dadosForm['dataNascimento'];
        $user->celular = $dadosForm['celular'];
        $user->telefone = $dadosForm['telefone'];
        $user->email = $dadosForm['email'];
        $user->endereco = $dadosForm['endereco'];
        $user->estado_civil = $dadosForm['estadoCivil'];
        $user->nacionalidade = $dadosForm['nacionalidade'];
        $user->bairro = $dadosForm['bairro'];
        $user->cidade = $dadosForm['cidade'];
        $user->sexo = $dadosForm['sexo'];
        $user->save();

        $ultimoAtendimento = OuvidoriaAtendimento::where('ano', date('Y'))->orderBy('id', 'desc')->first();
        $numero = $ultimoAtendimento ? $ultimoAtendimento->numero + 1 : 1;
        $codigo = preg_replace('/(\d{4})(\d{3})(\d{3})/', '$1.$2.$3', substr(str_pad(time(), 10, '0', STR_PAD_LEFT), -10));

        // CADASTRO DO ATENDIMENTO
        $atendimento = new OuvidoriaAtendimento;
        $atendimento->id_usuario = $user->id;
        $atendimento->numero = $numero;
        $atendimento->ano = date('Y');
        $atendimento->situacao = 'Novo';
        $atendimento->codigo = $codigo;
        $atendimento->sigiloso = $dadosForm['sigiloso'];
        $atendimento->assunto = $dadosForm['assunto'];
        $atendimento->prioridade = $dadosForm['prioridade'];
        $atendimento->tipo = $dadosForm['tipo']; //elogio, reaclamacao
        $atendimento->status = 'Aguardando resposta da Câmara';
        $atendimento->save();

        // CADASTRO DA MENSAGEM
        $mensagem = new OuvidoriaMensagem;
        $mensagem->id_atendimento = $atendimento->id;
        $mensagem->mensagem = $dadosForm['mensagem'];
        $mensagem->arquivo = $nome_arquivo;
        $mensagem->autor = 'usuario'; // 'camara'
        $mensagem->save();

        // CADASTRO



        //$usuario = OuvidoriaUsuario::find(29);

        // É OBRIGATÓRIO RETORNAR ALGUMA COISA
        return response()->json([
            'status' => true,
            'msg' => 'Solicitação cadastrada com sucesso!',
            'dados' => $dadosForm
        ]);

        // public function atendimento(Request $request, $id)
        // {
        //     $atendimento = OuvidoriaAtendimento::find($id);

        //     return view('atendimento', [
        //         'at' => $atendimento
        //     ]);
        // }

        // $retorno = [
        //     'status' => true,
        //     'msg' => 'Cadastro efetuado com sucesso!',
        //     'id' => $atendimento->id
        // ];
        // return response()->json($retorno);
    }

    public function admin(Request $request)
    {

        $dadosRespostForm = $request->all();

        //UPLOAD DO ARQUIVO
        $nome_arquivo = null;
        if ($request->file('arquivo')) {
            $FileHelper = new FileHelper;
            $infoAnexoImg = $FileHelper->upload([
                'file' => $request->file('arquivo'),
                'pasta' => 'ouvidoria/arquivos',
                'nome' => 'Arquivo Ouvidoria',
                'observacao' => '',
                'temporario' => false,
                'restrito' => true,
            ]);
            $nome_arquivo = $infoAnexoImg['status'] ? $infoAnexoImg['nome_arquivo'] : null;

            if (!$infoAnexoImg['status']) return ['status' => false, 'msg' => 'Falha no upload do arquivo.', 'retorno' => $infoAnexoImg];
        }

        // RESPOSTA DO ADMIN

        $resposta = new OuvidoriaMensagem;
        $resposta->id_atendimento = $dadosRespostForm['id_atendimento'];
        $resposta->autor = $dadosRespostForm['autor'];
        $resposta->mensagem = $dadosRespostForm['atendimentoRes'];
        $resposta->arquivo = $nome_arquivo;
        $resposta->save();




        // É OBRIGATÓRIO RETORNAR ALGUMA COISA
        return response()->json([
            'status' => true,
            'msg' => 'Solicitação cadastrada com sucesso!',
            'dados' => $dadosRespostForm
        ]);
    }
}
