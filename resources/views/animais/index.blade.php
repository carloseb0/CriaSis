@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Animais</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-info" href="{{ route('animais.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>

    <table class='table talbe-stipe table-bordered table-hover table-sm'>
        <thead class='table-dark'>
            <tr>
                <th>Cód.</th>
                <th>Raça</th>
                <th>Sexo</th>
                <th>Dt. Nascimento</th>
                <th width="10%">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arrAnimais as $animal)  
                <tr>
                    <td>{{ $animal->CODANIMAL}}</td>
                    <td>{{ $animal->NMRACA}}</td>
                    <td>{{ $animal->TPSEXO}}</td>
                    <td>{{ Carbon\Carbon::parse($animal->DANASCIMENTO)->format('d/m/Y')}}</td>
                    <td style="display: flex; justify-content: center; padding: 8px;">
                        <a href="{{ route('animais.edit', ['id'=>$animal->IDANIMAL]) }}" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                        <a href="#" onclick="return ConfirmaExclusao({{$animal->IDANIMAL}})" class="fa fa-trash" title="Remover"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('table-delete')
"animais"
@endsection