@extends('layout')

@section('cabecalho')

<h1 class="mt-4">Tables</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active">Obreiros</li>
    <a class="ml-auto mr-0 ml-auto mr-0" href="{{ route('form_criar_filiado') }}">Novo obreiro</a>
</ol>

@if(!empty($mensagem))
<div class="alert alert-success">
    {{$mensagem}}
</div>
@endif

@endsection
<!---------------------------LISTAGEM--------------------------------->
@section('conteudo')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        DataTable Example
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Ação</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($filiados as $filiado)
                        <tr>
                            <td>{{ $filiado->nome }}</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>
                                <form method="POST" action="/filiados/{{$filiado->id}}" onsubmit="return confirm('Deseja excluir o obreiro {{ addslashes($filiado->nome)}}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-primary">Remover</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
