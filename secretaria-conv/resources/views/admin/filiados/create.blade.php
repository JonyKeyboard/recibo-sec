@extends('layout')

@section('cabecalho')

<h1 class="mt-4">Cadastro de Obreiros</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="#">Obreiros</a></li>
    <li class="breadcrumb-item active">Cadastro</li>
    <a class="ml-auto mr-0" href="/filiados">Voltar</a>
</ol>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection

@section('conteudo')
<form method="post">
    @csrf
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome"> <!-- o meu name="nome" é quem será recuperado no request-->
        <!--<label for="nome">Data de Nascimento</label>
        <input type="text" class="form-control" name="nome" id="nascimento">
        <label for="nome">CPF</label>
        <input type="text" class="form-control" name="nome" id="cpf">
        <label for="nome">Nº COMEAD</label>
        <input type="text" class="form-control" name="nome" id="comead">
        <label for="nome">Nº CGADB</label>
        <input type="text" class="form-control" name="nome" id="cgadb">
        <label for="nome">Esposa</label>
        <input type="text" class="form-control" name="nome" id="esposa"> -->
    </div>
    <button class="btn btn-primary">Adicionar</button>
</form>
@endsection
