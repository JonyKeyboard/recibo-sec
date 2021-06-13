<?php

namespace App\Http\Controllers;

use App\Models\Filiado;
use Illuminate\Http\Request;

class FiliadoController extends Controller
{
    public function index(Request $request){

        $filiados = Filiado::all();
        $mensagem = $request->session()->get('mensagem');

        return view('admin.filiados.index', compact('filiados', 'mensagem'));
    }

    public function create(){
        return view('admin.filiados.create');
    }

    public function store(Request $request){
        $nome = $request->nome;
        Filiado::create([
            'nome' => $nome
        ]);

        $request->session()
        ->flash('mensagem', "{$nome} adicionado com sucesso");

        return redirect()->route('listar_filiados');
    }

    public function destroy(Request $request){
        Filiado::destroy($request->id);
        $request->session()
        ->flash('mensagem', "Obreiro removido com sucesso");

        return redirect()->route('listar_filiados');
    }
}
