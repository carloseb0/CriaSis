@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div>
                <h2>Animais</h2>
            </div>
            <div>
                <a class="btn"  id="btn-principal" href="{{ route('animais.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Raça</th>
                    <th>Sexo</th>
                    <th>Dt. Nascimento</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrAnimais->isEmpty())
                    @foreach($arrAnimais as $animal)  
                        <tr>
                            <td>{{ $animal->CODANIMAL}}</td>
                            <td>{{ $animal->raca->NMRACA}}</td>
                            <td>{{ $animal->DSTPSEXO}}</td>
                            <td>{{ Carbon\Carbon::parse($animal->DANASCIMENTO)->format('d/m/Y')}}</td>
                            <td style="display: flex; justify-content: center; padding: 8px;">
                                <a href="{{ route('animais.edit', ['id'=>$animal->IDANIMAL]) }}" title='Editar' class="fa fa-edit" id="btn-tarefas" style="margin-right: 10px"></a>
                                <a href="#" onclick="return ConfirmaExclusaoAnimal({{$animal->IDANIMAL}})" class="fa fa-trash" id="btn-tarefas" title="Remover"></a>
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
    {{ $arrAnimais->links("pagination::bootstrap-4") }}
</div>
@stop

@section('table-delete')
"animais"
@endsection