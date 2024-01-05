<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function home(Request $request, $dados = [])
    {
        return view('homepage', ['nome' => 'João da Silva']);
    }
}
