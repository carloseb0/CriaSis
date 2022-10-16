@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Dietas</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-info" href="{{ route('dietas.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>

    <table class='table talbe-stipe table-bordered table-hover table-sm'>
        <thead class='table-dark'>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Descricão</th>
                <th>Finalidade</th>
                <th>Ração</th>
                <th>Ativo</th>
                <th width="10%">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $arrTiposDieta = ['E'=>'Engorda', 'C'=>'Cresciemnto']?>
            @foreach($arrDietas as $dieta)  
                <tr>
                    <td>{{ $dieta->IDDIETA}}</td>
                    <td>{{ $dieta->NMDIETA}}</td>
                    <td>{{ $dieta->DSDIETA}}</td>
                    <td>{{ $arrTiposDieta[$dieta->TPUSODIETA]}}</td>
                    <td>{{ $dieta->NMRACAO}}</td>
                    <td>{{ $dieta->FLATIVO}}</td>
                    <td style="display: flex; justify-content: center; padding: 8px;">
                        <a href="{{ route('dietas.edit', ['id'=>$dieta->IDDIETA]) }}" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                        <a href="#" onclick="return ConfirmaExclusao({{$dieta->IDDIETA}})" class="fa fa-trash" title="Remover"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
@stop

@section('table-delete')
"dietas"
@endsection