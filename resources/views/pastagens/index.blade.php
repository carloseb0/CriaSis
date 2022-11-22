@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left">
                <h2>Pastagens</h2>
            </div>
            <div class="pull-right">
                <a class="btn" id="btn-principal" href="{{ route('pastagens.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Cultura</th>
                    <th>Ativo</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrPastagens->isEmpty())
                    @foreach($arrPastagens as $pastagem)  
                        <tr>
                            <td>{{ $pastagem->IDPASTAGEM}}</td>
                            <td>{{ $pastagem->NMPASTAGEM}}</td>
                            <td>{{ $pastagem->DSTPCULTURA}}</td>
                            <td>{{ $pastagem->DSFLATIVO}}</td>
                            <td style="display: flex; justify-content: center; padding: 9px;">
                                <a href="{{ route('pastagens.edit', ['id'=>$pastagem->IDPASTAGEM]) }}" title='Editar' class="fa fa-edit"id="btn-tarefas"style="margin-right: 10px"></a>
                                <a href="#" onclick="return ConfirmaExclusao({{$pastagem->IDPASTAGEM}})" class="fa fa-trash" id="btn-tarefas"itle="Remover"></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                       <td colspan="6" style='text-align: center;'>Nenhum Registro Encontrado</td>
                   </tr>   
               @endif
            </tbody>
        </table>
    </div>
    {{ $arrPastagens->links("pagination::bootstrap-4") }}
</div>
@stop

@section('table-delete')
"pastagens"
@endsection