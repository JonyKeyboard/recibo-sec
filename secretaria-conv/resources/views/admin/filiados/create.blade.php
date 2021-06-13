@extends('layout')

@section('cabecalho')

<h1 class="mt-4">Cadastro de Obreiros</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="#">Obreiros</a></li>
    <li class="breadcrumb-item active">Cadastro</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
    </div>
</div>

@endsection

@section('conteudo')
<form method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome">

    </div>
    <button class="btn btn-primary">Adicionar</button>
</form>
@endsection
