@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between; align-items: center;'>
            <div>
                <h2>Dietas</h2>
            </div>
            <div>
                <a class="btn btn-info" href="{{ route('dietas.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
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
                @if($arrDietas != '0')
                    @foreach($arrDietas as $dieta)  
                        <tr>
                            <td>{{ $dieta->IDDIETA}}</td>
                            <td>{{ $dieta->NMDIETA}}</td>
                            <td>{{ $dieta->DSDIETA}}</td>
                            <td>{{ $dieta->DSTPUSODIETA}}</td>
                            <td>{{ $dieta->racao->NMRACAO}}</td>
                            <td>{{ $dieta->DSFLATIVO}}</td>
                            <td style="display: flex; justify-content: center; padding: 8px;">
                                <a href="{{ route('dietas.edit', ['id'=>$dieta->IDDIETA]) }}" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                                <a href="#" onclick="return ConfirmaExclusao({{$dieta->IDDIETA}})" class="fa fa-trash" title="Remover"></a>
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
    {{ $arrDietas->links("pagination::bootstrap-4") }}
</div>

    
@stop

@section('table-delete')
"dietas"
@endsection