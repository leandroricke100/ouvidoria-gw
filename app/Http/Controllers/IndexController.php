<?php

namespace App\Http\Controllers;

use App\Models\OuvidoriaAtendimento;
use App\Models\OuvidoriaMensagem;
use App\Models\OuvidoriaResposta;
use App\Models\OuvidoriaUsuario;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function home(Request $request)
    {
        //
    }

    public function atendimento(Request $request, $id)
    {
        if (!session('usuario')) return redirect(route('usuario-ouvidoria'));

        $atendimento = OuvidoriaAtendimento::find($id);
        $mensagens = OuvidoriaMensagem::where('id_atendimento', $id)->orderBy('id')->get()->all();
        $user = session('usuario');

        if (!$atendimento) return view('404', ['msg' => 'Página não encontrada!']);

        return view('ouvidoria-atendimento', [
            'atendimento' => $atendimento,
            'mensagens' => $mensagens,
            'user' => $user,
        ]);
    }

    public function atendimentos(Request $request)
    {
        if (!session('usuario')) return redirect(route('usuario-ouvidoria'));

        $atendimentos = OuvidoriaAtendimento::where('id_usuario', session('usuario')->id)->get()->all();

        if (!$atendimentos) return view('404', ['msg' => 'Página não encontrada!']);


        return view('ouvidoria-atendimentos', [
            'atendimentos' => $atendimentos,
            'usuario' => session('usuario'),
        ]);
    }

    public function admin(Request $request, $id)
    {

        $atendimento = OuvidoriaAtendimento::find($id);
        $mensagens = OuvidoriaMensagem::where('id_atendimento', $id)->orderBy('id')->get()->all();
        $user = OuvidoriaUsuario::session('usuario')->id;


        if (!$atendimento) return view('404', ['msg' => 'Página não encontrada!']);

        return view('admin-atendimento', [
            'atendimento' => $atendimento,
            'mensagens' => $mensagens,
            'user' => $user,
        ]);
    }
}
