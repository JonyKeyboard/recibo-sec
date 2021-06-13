<?php

namespace App\Http\Controllers;

use App\Models\Filiado;
use Illuminate\Http\Request;

class FiliadoController extends Controller
{
    public function index(Request $request){

        $filiados = Filiado::all();

        return view('admin.filiados.index', compact('filiados'));
    }

    public function create(){
        return view('admin.filiados.create');
    }

    public function store(Request $request){
        $nome = $request->nome;
        $filiado = Filiado::create([
            'nome' => $nome
        ]);

        return redirect('/filiados');
    }
}
