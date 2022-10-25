@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div>
                <h2>Gestações</h2>
            </div>
            <div>
                <a class="btn btn-info" href="{{ route('gestacoes.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
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
                        <td>{{ $gestacao->animais->CODANIMAL}}</td>
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
    </div>
    {{ $arrGestacoes->links("pagination::bootstrap-4") }}
</div>


    
@stop

@section('table-delete')
"gestacoes"
@endsection