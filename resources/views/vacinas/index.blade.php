@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left">
                <h2>Vacinas</h2>
            </div>
            <div class="pull-right">
                <a class="btn" id='btn-principal' href="{{ route('vacinas.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Dose</th>
                    <th>Dt. Validade</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrVacinas->isEmpty())
                    @foreach($arrVacinas as $vacina)  
                        <tr>
                            <td>{{ $vacina->IDVACINA}}</td>
                            <td>{{ $vacina->NMVACINA}}</td>
                            <td>{{ $vacina->QTDOSE}}</td>
                            <td>{{ Carbon\Carbon::parse($vacina->DAVALIDADE)->format('d/m/Y') }}</td>
                            <td style="display: flex; justify-content: center; padding: 9px;">
                                <a href="{{ route('vacinas.edit', ['id'=>$vacina->IDVACINA]) }}" id="btn-tarefas" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                                <a href="#" onclick="return ConfirmaExclusao({{$vacina->IDVACINA}})" class="fa fa-trash"id="btn-tarefas" title="Remover"></a>
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
    {{ $arrVacinas->links("pagination::bootstrap-4") }}
</div>
@stop

@section('table-delete')
"vacinas"
@endsection