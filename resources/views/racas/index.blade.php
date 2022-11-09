@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left">
                <h2>Raças</h2>
            </div>
            <div class="pull-right">
                <a class="btn" id="btn-principal" href="{{ route('racas.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Ativo </th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrRacas->isEmpty())
                    @foreach($arrRacas as $raca)  
                        <tr>
                            <td>{{ $raca->IDRACA}}</td>
                            <td>{{ $raca->NMRACA}}</td>
                            <td>{{ $raca->DSFLATIVO}}</td>
                            <td style="display: flex; justify-content: center; padding: 9px;">
                                <a href="{{ route('racas.edit', ['id'=>$raca->IDRACA]) }}"id="btn-tarefas" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                                <a href="#" onclick="return ConfirmaExclusao({{$raca->IDRACA}})" id="btn-tarefas"class="fa fa-trash" title="Remover"></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                       <td colspan="4" style='text-align: center;'>Nenhum Registro Encontrado</td>
                   </tr>   
               @endif
            </tbody>
        </table>
    </div>
    {{ $arrRacas->links("pagination::bootstrap-4") }}
</div>
@stop

@section('table-delete')
"racas"
@endsection