<?php

namespace App\Http\Controllers;

use App\Models\OuvidoriaAtendimento;
use App\Models\OuvidoriaMensagem;
use App\Models\OuvidoriaResposta;
use App\Models\OuvidoriaUsuario;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class IndexController extends Controller
{

    public function home(Request $request, $dados = [])
    {



        // $usuario = new OuvidoriaUsuario;
        // $usuario->nome_completo = 'Teste';
        // $usuario->save();

        // $usuario = OuvidoriaUsuario::find(1);
        //$usuarios = OuvidoriaAtendimento::where('situacao', 'novo')->get()->first();

        // foreach ($usuarios as $usuario) {
        //     $usuario->delete();
        // }


        //$usuarios = OuvidoriaUsuario::where('pessoa_fisica', null)->get()->all();


        // foreach ($usuarios as $usuario) {
        //     $usuario->pessoa_fisica = 'nao';
        //     $usuario->save();
        // }


        // $usuario->delete();

        // $usuario = OuvidoriaUsuario::where('id', 6)->get()->first();
        // $usuario = OuvidoriaUsuario::find(6);
        // $usuario->sigilo = "sim";
        // $usuario->save();


        // /ouvidoria/consulta/1

        // $atendimento = OuvidoriaUsuario::find(34);

        // $password = OuvidoriaUsuario::where('cpf', '39590044867')->get()->first();




        // $arrayTeste = [
        //     'coluna1' => 'valor1',
        //     'coluna2' => 'valor2'
        // ];

        // let objTeste = {
        //     coluna1: 'valor1',
        //     coluna2: 'valor2'
        // };


        // WHEREy
        // ORDENAR
        // PEGAR 1 SÓ
        // PEGAR MAIS DE 1 RESULTADO
        // DELETAR
        // CRIAR UM NOVO CADASTRO
        // ENVIAR VARIAVEL PRO FRONT E MOSTRAR
        // FOREACH
        // MOSTRAR LISTA DE RESULTADOS COM FOREACH NO FRONT

        // $arrayTeste = [
        //     'nome' => '123',
        //     'aaaa' => $atendimento,
        //     'respostas' => $password,
        //     'lalala' => 'askdklasdkasdkj',
        //     //'abacate' => $usuarios,
        // ];

        // return view('homepage', $arrayTeste);
    }


    public function atendimento(Request $request, $id)
    {
        $atendimento = OuvidoriaAtendimento::find($id);
        $mensagens = OuvidoriaMensagem::where('id_atendimento', $id)->orderBy('id')->get()->all();
        $user = OuvidoriaUsuario::find($id);


        if (!$atendimento) return view('404', ['msg' => 'Página não encontrada!']);


        return view('ouvidoria-atendimento', [
            'atendimento' => $atendimento,
            'mensagens' => $mensagens,
            'user' => $user,
        ]);
    }

    public function atendimentos(Request $request)
    {

        $atendimentos = OuvidoriaAtendimento::where('id_usuario', 1)->get()->all();
        $user = OuvidoriaUsuario::find(1);


        if (!$atendimentos) return view('404', ['msg' => 'Página não encontrada!']);


        return view('ouvidoria-atendimentos', [
            'atendimentos' => $atendimentos,
            'user' => $user,
        ]);
    }

    public function admin(Request $request, $id)
    {


        $atendimento = OuvidoriaAtendimento::find($id);
        $mensagens = OuvidoriaMensagem::where('id_atendimento', $id)->orderBy('id')->get()->all();
        $user = OuvidoriaUsuario::find($id);


        if (!$atendimento) return view('404', ['msg' => 'Página não encontrada!']);

        return view('admin-atendimento', [
            'atendimento' => $atendimento,
            'mensagens' => $mensagens,
            'user' => $user,
        ]);
    }
}
