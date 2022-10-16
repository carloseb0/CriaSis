@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Vacinas</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-success" href="{{ route('vacinas.create') }}">Novo Registro</a>
            </div>
        </div>
        
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead class='table-dark'>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Finalidade</th>
                    <th>Fabricante</th>
                    <th>Dose</th>
                    <th>Dt. Validade</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($arrVacinas as $vacina)  
                    <tr>
                        <td>{{ $vacina->IDVACINA}}</td>
                        <td>{{ $vacina->NMVACINA}}</td>
                        <td>{{ $vacina->DSFINALIDADE}}</td>
                        <td>{{ $vacina->NMFABRICANTE}}</td>
                        <td>{{ $vacina->QTDOSE}}</td>
                        <td>{{ Carbon\Carbon::parse($vacina->DAVALIDADE)->format('d/m/Y') }}</td>
                        <td style="display: flex; justify-content: center; padding: 9px;">
                            <a href="{{ route('vacinas.edit', ['id'=>$vacina->IDVACINA]) }}" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                            <a href="#" onclick="return ConfirmaExclusao({{$vacina->IDVACINA}})" class="fa fa-trash" title="Remover"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('table-delete')
"vacinas"
@endsection