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
        <div class="border">
            <div class="mt-3 mb-3 mr-3 ml-3">
                    <div class="col-8">
                        <div class="form-row">
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" name="nome" id="nome"> <!-- o meu name="nome" é quem será recuperado no request-->
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" class="form-control" name="cpf" id="cpf">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="nascimento">Data de Nascimento</label>
                                    <input type="text" class="form-control" name="nascimento" id="nascimento">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group">
                                    <label for="esposa">Esposa</label>
                                    <input type="text" class="form-control" name="esposa" id="esposa">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="comead">Nº COMEAD</label>
                                    <input type="text" class="form-control" name="comead" id="comead">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="cgadb">Nº CGADB</label>
                                    <input type="text" class="form-control" name="cgadb" id="cgadb">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="funcao">Função</label>
                                    <select class="form-control">
                                        <option value="1">pastor</option>
                                        <option value="2">evangelista</option>
                                        <option value="3">presbítero</option>
                                        <option value="4">diácono</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----------------IMAGEM----------------->
                    <!----------------FALTA IMPLEMENTAR----------------->
            </div>
        </div>
        <button class="btn btn-primary btn-block mt-3">Cadastrar</button>
    </form>

@endsection
