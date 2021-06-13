<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiliadoController extends Controller
{
    public function index(Request $request){

        $filiados = [
            'Jair Messias',
            'Antonio Carlos Jobim',
            'Virgulino Ferreira',
            'Fernando Fernandes',
            'Matias Tartiere',
            'Alexandre Wolwacz',
            'Thiago Bisi'
        ];

        return view('admin.filiados.index', compact('filiados'));
    }

    public function create(Request $request){
        return view('admin.filiados.create');
    }
}
