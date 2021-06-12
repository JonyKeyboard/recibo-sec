<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiliadoController extends Controller
{
    public function index(Request $request){
        return view('admin.filiados.index');
    }

    public function create(){
        return view('admin.filiados.create');
    }
}
