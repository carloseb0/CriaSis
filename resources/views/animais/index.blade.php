@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Animais</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-success" href="{{ route('animais.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>

    <table class='table talbe-stipe table-bordered table-hover'>
        <thead>
            <tr>
                <th>Cód.</th>
                <th>Raça</th>
                <th>Sexo</th>
                <th>Dt. Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arrAnimais as $animal)  
                <tr>
                    <td>{{ $animal->CODANIMAL}}</td>
                    <td>{{ $animal->NMRACA}}</td>
                    <td>{{ $animal->TPSEXO}}</td>
                    <td>{{ $animal->DANASCIMENTO}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
@stop