<?php

namespace App\Http\Controllers;

use App\Models\OuvidoriaAtendimento;
use App\Models\OuvidoriaMensagem;
use App\Models\OuvidoriaResposta;
use App\Models\OuvidoriaUsuario;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function home(Request $request, $dados = [])
    {
    }

    public function atendimento(Request $request, $id)
    {
        $atendimento = OuvidoriaAtendimento::find($id);
        $mensagens = OuvidoriaMensagem::where('id_atendimento', $id)->orderBy('id')->get()->all();
        $user = OuvidoriaUsuario::find(1);


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
