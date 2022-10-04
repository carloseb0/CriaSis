@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Raças</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('racas.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>

    <table class='table talbe-stipe table-bordered table-hover'>
        <thead>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Ativo </th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arrRacas as $raca)  
                <tr>
                    <td>{{ $raca->IDRACA}}</td>
                    <td>{{ $raca->NMRACA}}</td>
                    <td>{{ $raca->FLATIVO}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
@stop