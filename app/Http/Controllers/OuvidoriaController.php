<?php

namespace App\Http\Controllers;

use App\Helper\FileHelper;
use App\Models\OuvidoriaAtendimento;
use App\Models\OuvidoriaMensagem;
use App\Models\OuvidoriaUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class OuvidoriaController extends Controller
{
    public function cadastro(Request $request)
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
        $user->senha = Hash::make($dadosForm['senha']);
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
        $mensagem->autor = 'usuario';
        $mensagem->save();

        session([
            'usuario' => $user
        ]);

        return response()->json([
            'status' => true,
            'msg' => 'Solicitação cadastrada com sucesso!',
            'dados' => $dadosForm
        ]);
    }

    public function mensagemAdmin(Request $request)
    {
        $dadosForm = $request->all();

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

        $resposta = new OuvidoriaMensagem;
        $resposta->id_atendimento = $dadosForm['id_atendimento'];
        $resposta->autor = $dadosForm['autor'];
        $resposta->mensagem = $dadosForm['atendimentoRes'];
        $resposta->arquivo = $nome_arquivo;
        $resposta->save();

        return response()->json([
            'status' => true,
            'msg' => 'Solicitação cadastrada com sucesso!',
            'dados' => $dadosForm
        ]);
    }

    public function mensagemUsuario(Request $request)
    {

        $dadosForm = $request->all();

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

        $respostaUsuario = new OuvidoriaMensagem;
        $respostaUsuario->id_atendimento = $dadosForm['id_atendimento'];
        $respostaUsuario->autor = $dadosForm['autor'];
        $respostaUsuario->mensagem = $dadosForm['atendimentoUsuario'];
        $respostaUsuario->arquivo = $nome_arquivo;
        $respostaUsuario->save();


        return response()->json([
            'status' => true,
            'msg' => 'Solicitação cadastrada com sucesso!',
            'dados' => $dadosForm
        ]);
    }

    public function atendimento(Request $request)
    {
        $dadosForm = $request->all();

        if (!session('usuario')) return ['status' => false, 'msg' => 'Usuário desconectado!'];

        $ultimoAtendimento = OuvidoriaAtendimento::where('ano', date('Y'))->orderBy('id', 'desc')->first();
        $numero = $ultimoAtendimento ? $ultimoAtendimento->numero + 1 : 1;
        $codigo = preg_replace('/(\d{4})(\d{3})(\d{3})/', '$1.$2.$3', substr(str_pad(time(), 10, '0', STR_PAD_LEFT), -10));

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


        $atendimento = new OuvidoriaAtendimento;
        if ($dadosForm['sigilo'] === 'semSigilo') {
            $atendimento->sigiloso = 0;
        } else {
            $atendimento->sigiloso = 1;
        }
        $atendimento->assunto = $dadosForm['assunto'];
        $atendimento->tipo = $dadosForm['tipo'];
        $atendimento->situacao = 'Novo';
        $atendimento->ano = date('Y');
        $atendimento->numero = $numero;
        $atendimento->status = 'Aguardando resposta da Câmara';
        $atendimento->codigo = $codigo;
        $atendimento->prioridade = $dadosForm['prioridade'];
        $atendimento->id_usuario = session('usuario')->id;
        $atendimento->save();

        $mensagem = new OuvidoriaMensagem;

        $mensagem->mensagem = $dadosForm['atendimento'];
        $mensagem->id_atendimento = $atendimento->id;
        $mensagem->arquivo = $nome_arquivo;
        $mensagem->autor = 'usuario';
        $mensagem->save();

        return response()->json([
            'status' => false,
            'msg' => 'TESTEbla',
            'dados' => $dadosForm
        ]);
    }

    public function deleteMsg(Request $request)
    {
        $dadosForm = $request->all();
        $mensagem = OuvidoriaMensagem::find($dadosForm['id']);



        if ($mensagem) {
            $mensagem->delete();

            return response()->json([
                'status' => true,
                'msg' => 'Mensagem deletada',
                'dados' => $dadosForm
            ]);
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Mensagem não encontrada!',
            ]);
        }
    }

    public function inputAdmin(Request $request)
    {

        $dadosForm = $request->all();

        $atendimento = OuvidoriaAtendimento::find($dadosForm['id']);
        $atendimento->situacao = $dadosForm['situacao'];
        if ($dadosForm['resposta'] == 'usuario') {
            $atendimento->status = 'Aguardando resposta do Usuário';
        } else {
            $atendimento->status = 'Aguardando resposta da Câmara';
        }
        $atendimento->save();


        return response()->json([
            'status' => true,
            'msg' => 'Valor trocado',
            'dados' => $dadosForm
        ]);
    }


    public function login(Request $request)
    {
        $dados = $request->all();
        $metodo = $dados['metodo'];

        if ($metodo == 'login') {
            $user = OuvidoriaUsuario::where('email', $dados['email'])->get()->first();


            if (!$user) return response()->json(['status' => false, 'msg' => 'Não existe conta com este endereço de email']);

            if (!Hash::check($dados['senha'], $user->senha)) return response()->json(['status' => false, 'msg' => 'Senha incorreta!']);

            // LOGAR USUÁRIO -> DEFININDO SESSION
            session([
                'usuario' => $user
            ]);


            return response()->json([
                'status' => true,
                'msg' => 'logado',
                'dados' => $dados
            ]);
        } else if ($metodo == 'sair') {
            // DESLOGAR
            session()->invalidate();

            return response()->json([
                'status' => true,
                'msg' => 'Deslogado'
            ]);
        }
    }

    public function recuperarLogin(Request $request)
    {
        $dados = $request->all();

        $user = OuvidoriaUsuario::where('email', $dados['email'])->get()->first();



        if (!$user) {
            return response()->json(['status' => false, 'msg' => 'Não existe conta com este endereço de email']);
        } else {
            $token = rand(1000, 9999);
            mail($dados['email'], 'Recuperação de Senha', 'Seu token para alterar sua senha é:<br>' . $token);

            $user->token_senha = $token;
            $user->save();

            return response()->json([
                'status' => true,
                'msg' => 'Verifique seu email para obter o código de alteração da sua senha.',
                'dados' => $dados
            ]);
        }
    }

    public function recuperarSenha(Request $request)
    {
        $dados = $request->all();

        $user = OuvidoriaUsuario::where('email', $dados['email'])->get()->first();

        if (!$user || $dados['senha'] != $dados['confirmarSenha'] || $dados['token'] != $user['token_senha'] || !$dados['senha']) {
            return response()->json(['status' => false, 'msg' => 'Dados inválidos do token ou senha']);
        } else {

            $user->senha = Hash::make($dados['senha']);
            $user->save();

            return response()->json([
                'status' => true,
                'msg' => 'Nova senha cadastrada.',
                'dados' => $dados
            ]);
        }
    }

    public function protocolo(Request $request)
    {
        $dados = $request->all();

        $protocolo = OuvidoriaAtendimento::where('codigo', $dados['numberProtocolo'])->where('created_at', '>=', $dados['data'] . ' 00:00:00')->where('created_at', '<=', $dados['data'] . ' 23:59:59')->get()->first();

        if (!$protocolo) return response()->json(['status' => false, 'msg' => 'Não foi encontrado nenhum protocolo com esses dados.']);


        $dataFormat = str_replace('-', '', $dados['data']);
        $numFormat = str_replace('.', '', $dados['numberProtocolo']);

        $link = route('usuario-protocolo', ['data' => $dataFormat, 'numero' => $numFormat]);

        return response()->json([
            'status' => true,
            'msg' => 'Protocolo encontrado',
            'dados' => $protocolo,
            'link' => $link
        ]);
    }
}
