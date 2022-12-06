@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left">
                <h2>Gerenciamento De Animal</h2>
            </div>
            <div class="pull-right">
                <a class="btn" id='btn-principal' href="{{ route('gerenciamentos.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Pastagem</th>
                    <th>Dieta</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrGerenciamento->isEmpty())
                    @foreach($arrGerenciamento as $gerenciamento)  
                        <tr>
                            <td>{{ $gerenciamento->IDGERENCIAMENTO}}</td>
                            <td>{{ $gerenciamento->lote->NMLOTE}}</td>
                            <td>{{ $gerenciamento->pastagem->NMPASTAGEM}}</td>
                            <td>{{ $gerenciamento->dieta->NMDIETA}}</td>
                            <td style="display: flex; justify-content: center; padding: 9px;">
                                <a href="{{ route('gerenciamentos.edit', ['id'=>$gerenciamento->IDGERENCIAMENTO]) }}" id="btn-tarefas" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                                <a href="#" onclick="return ConfirmaExclusao({{$gerenciamento->IDGERENCIAMENTO}})" class="fa fa-trash"id="btn-tarefas" title="Remover"></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                       <td colspan="7" style='text-align: center;'>Nenhum Registro Encontrado</td>
                   </tr>   
               @endif
            </tbody>
        </table>
    </div>
    {{ $arrGerenciamento->links("pagination::bootstrap-4") }}
</div>
@stop

@section('table-delete')
"gerenciamentos"
@endsection