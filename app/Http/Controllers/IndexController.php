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

    public function protocolo(Request $request, $numero, $data)
    {

        $data = substr($data, 0, 4) . '-' . substr($data, 4, 2) . '-' . substr($data, 6, 2);
        $protocolo = substr($numero, 0, 4) . '.' . substr($numero, 4, 3) . '.' . substr($numero, 7, 3);

        // if (!strlen($data) == 8) return view('404', ['msg' => 'Página não encontrada']);
        // if (!strlen($numero) == 8) return view('404', ['msg' => 'Página não encontrada']);

        $atendimento = OuvidoriaAtendimento::where('codigo', $protocolo)->where('created_at', '>=', $data . ' 00:00:00')->where('created_at', '<=', $data . ' 23:59:59')->get()->first();

        if (!$atendimento || !$data) return view('404', ['msg' => 'Página não encontrada']);

        $mensagens = OuvidoriaMensagem::where('id_atendimento', $atendimento->id)->orderBy('id')->get()->all();


        return view('ouvidoria-atendimento', [
            'atendimento' => $atendimento,
            'mensagens' => $mensagens
        ]);
    }
}
