@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Gestações</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-info" href="{{ route('gestacoes.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>

    <table class='table talbe-stipe table-bordered table-hover table-sm'>
        <thead class='table-dark'>
            <tr>
                <th>Cód.</th>
                <th>Animal</th>
                <th>Dt. Inseminação</th>
                <th>Dt. Nascimento Estimado</th>
                <th>Cuidado</th>
                <th width="10%">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arrGestacoes as $gestacao)  
                <tr>
                    <td>{{ $gestacao->IDGESTACAO}}</td>
                    <td>{{ $gestacao->IDANIMAL}}</td>
                    <td>{{ Carbon\Carbon::parse($gestacao->DAINSEMINACAO)->format('d/m/Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($gestacao->DANASCIMENTOESTIMADO)->format('d/m/Y') }}</td>
                    <td>{{ $gestacao->TPCUIDADO}}</td>
                    <td style="display: flex; justify-content: center; padding: 8px;">
                        <a href="{{ route('gestacoes.edit', ['id'=>$gestacao->IDGESTACAO]) }}" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                        <a href="#" onclick="return ConfirmaExclusao({{$gestacao->IDGESTACAO}})" class="fa fa-trash" title="Remover"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
@stop

@section('table-delete')
"gestacoes"
@endsection