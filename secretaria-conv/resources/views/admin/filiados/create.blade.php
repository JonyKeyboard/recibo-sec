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
        <div class="border rounded">

            <div class="row m-2">
                <!--Formulário-->
                <div class="col-md-6">
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
                                <label for="nascimento">Nascimento</label>
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
                <!--Foto do Formulário-->
                <div class="col-md-3">
                    <div class="card">

                        <img src="/img/imagem-3x4.jpg" class="" width="160px" height="215px">

                        <div class="card-body">
                          <h5 class="card-title">Stanley jony</h5>
                          <p class="card-text">Software Developer</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-block">Cadastrar</button>
    </form>

@endsection
