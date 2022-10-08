@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Pastagens</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-success" href="{{ route('pastagens.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>

    <table class='table talbe-stipe table-bordered table-hover'>
        <thead>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Cultura</th>
                <th>Dt. Liberação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arrPastagens as $pastagem)  
                <tr>
                    <td>{{ $pastagem->IDPASTAGEM}}</td>
                    <td>{{ $pastagem->NMPASTAGEM}}</td>
                    <td>{{ $pastagem->TPCULTURA}}</td>
                    <td>{{ $pastagem->DALIBERACAO}}</td>
                    <td>{{ $pastagem->FLATIVO}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
@stop