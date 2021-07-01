@extends('layout')

@section('cabecalho')

<h1 class="mt-4">@if(isset($filiado)) Editar Obreiro @else Cadastrar Obreiro @endif</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="#">Obreiro</a></li>
    <li class="breadcrumb-item active">@if(isset($filiado)) Edição @else Cadastro @endif</li>
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

    <!--SELEÇÃO DO FORM-->
    @if(isset($filiado))
        <form method="post" action="atualizar" enctype="multipart/form-data">
            @method('PUT')
    @else
        <form method="post" enctype="multipart/form-data">
    @endif
    <!--FIM SELEÇÃO DO FORM-->

        @csrf
        <div class="border rounded">

            <div class="row m-2">
                <!--Formulário-->
                <div class="col-md-8">
                    <div class="form-row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" id="nome" value="{{ $filiado->nome ?? ''}}"> <!-- o meu name="nome" é quem será recuperado no request-->
                                @error('nome')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        {{--------------------------Unique(Database) para validar CPF---------------------------}}
                        <div class="col-4">
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control @error('cpf') is-invalid @enderror" autocomplete="off" name="cpf" id="cpf" value="{{ $filiado->cpf ?? ''}}">
                                @error('cpf')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="nascimento">Nascimento</label>
                                <input type="date" class="form-control" name="nascimento" id="nascimento"
                                value="{{ isset($filiado) ? date('Y-m-d', strtotime($filiado->nascimento)) : ''}}">
                                {{-- {{ $filiado->nascimento->format('Y-m-d') }} --}}

                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="esposa">Esposa</label>
                                <input type="text" class="form-control" name="esposa" id="esposa" value="{{ $filiado->esposa ?? ''}}">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-row">
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
                                <select class="form-control" name="funcao" id="funcao">
                                    <option value="pastor">pastor</option>
                                    <option value="evangelista">evangelista</option>
                                    <option value="presbítero">presbítero</option>
                                    <option value="diácono">diácono</option>
                                </select>
                            </div>
                        </div>
                    </div> --}}

                </div>
                <!--Foto do Formulário-->
                <div class="col-md-4">
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 15rem;">
                            <img src="/img/filiados/{{ $filiado->imageFiliado ?? '../imagem-3x4.jpg'}}" class=""> <!-- -->
                            <label for="imageFiliado"> Foto do Obreiro:</label>
                            <input type="file" name="imageFiliado" class="form-control-file">
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-block mt-2">@if(isset($filiado)) Atualizar @else Cadastrar @endif</button>
    </form>

@endsection
