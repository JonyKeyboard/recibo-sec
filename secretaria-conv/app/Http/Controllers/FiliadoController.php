<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiliadoFormRequest;
use App\Models\Filiado;
use Illuminate\Console\Scheduling\Event;
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

    public function store(FiliadoFormRequest $request){

        $filiado = new Filiado();
        $filiado->nome = $request->nome;
        $filiado->cpf = $filiado->validaCPF($request->cpf) ? $request->cpf : "cpf inválido";

        $filiado->nascimento = $request->nascimento;
        $filiado->esposa = $request->esposa;
        /* $filiado->comead = $request->comead;
        $filiado->cgadb = $request->cgadb;
        $filiado->funcao = $request->funcao;
        */

        //image upload
        $filiado->imageFiliado = $filiado->validaImagem($request);

        $filiado->save();
        $request->session()
        ->flash('mensagem', "{$filiado->nome} adicionado com sucesso");

        return redirect()->route('listar_filiados');
    }

    public function destroy(Request $request){
        Filiado::destroy($request->id);
        $request->session()
        ->flash('mensagem', "Obreiro removido com sucesso");

        return redirect()->route('listar_filiados');
    }

    public function edit($id){

        $filiado = Filiado::findOrFail($id);

        //var_dump($filiado);

        return view('admin.filiados.create', compact('filiado'));
    }

    public function update(FiliadoFormRequest $request){

        $filiado = Filiado::findOrFail($request->id);
        $filiado->nome = $request->nome;
        $filiado->cpf = $request->cpf;
        $filiado->nascimento = $request->nascimento;
        $filiado->esposa = $request->esposa;

        //image upload
        if(isset($request->imageFiliado)){
            $filiado->imageFiliado = $filiado->validaImagem($request);
        }

        /*$filiado->comead = $request->comead;
        $filiado->cgadb = $request->cgadb;
        $filiado->funcao = $request->funcao; */

        $filiado->update();
        $request->session()
        ->flash('mensagem', "{$filiado->nome} atualizado com sucesso");

        return redirect()->route('listar_filiados');

    }
}
