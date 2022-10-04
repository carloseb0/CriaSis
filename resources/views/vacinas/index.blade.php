@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vacinas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('vacinas.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>

    <table class='table talbe-stipe table-bordered table-hover'>
        <thead>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Finalidade</th>
                <th>Fabricante</th>
                <th>Dose</th>
                <th>Dt. Validade</th>
                <th>Ações</th>
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
                    <td>{{ $vacina->DAVALIDADE}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
@stop