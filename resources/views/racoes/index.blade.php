@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div>
                <h2>Ração</h2>
            </div>
            <div>
                <a class="btn btn-info" href="{{ route('racoes.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Fabricante</th>
                    <th>Qtd.</th>
                    <th>Dt. Validade</th>
                    <th>Ativo</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if($arrRacoes != '0')
                    @foreach($arrRacoes as $racao)  
                        <tr>
                            <td>{{ $racao->IDRACAO}}</td>
                            <td>{{ $racao->NMRACAO}}</td>
                            <td>{{ $racao->NMFABRICANTE}}</td>
                            <td>{{ $racao->QTKG}}</td>
                            <td>{{ Carbon\Carbon::parse($racao->DAVALIDADE)->format('d/m/Y')}}</td>
                            <td>{{ $racao->DSFLATIVO}}</td>
                            <td style="display: flex; justify-content: center; padding: 8px;">
                                <a href="{{ route('racoes.edit', ['id'=>$racao->IDRACAO]) }}" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                                <a href="#" onclick="return ConfirmaExclusao({{$racao->IDRACAO}})" class="fa fa-trash" title="Remover"></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                     <tr>
                        <td colspan="5" style='text-align: center;'>Nenhum Registro Encontrado</td>
                    </tr>   
                @endif
            </tbody>
        </table>
    </div>
    {{ $arrRacoes->links("pagination::bootstrap-4") }}
</div>
@stop

@section('table-delete')
"racoes"
@endsection