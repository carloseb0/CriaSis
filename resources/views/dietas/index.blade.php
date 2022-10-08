@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Dietas</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-success" href="{{ route('dietas.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>

    <table class='table talbe-stipe table-bordered table-hover'>
        <thead>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Descricão</th>
                <th>Finalidade</th>
                <th>Ração</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arrDietas as $dieta)  
                <tr>
                    <td>{{ $dieta->IDDIETA}}</td>
                    <td>{{ $dieta->NMDIETA}}</td>
                    <td>{{ $dieta->DSDIETA}}</td>
                    <td>{{ $dieta->TPUSODIETA}}</td>
                    <td>{{ $dieta->NMRACAO}}</td>
                    <td>{{ $dieta->FLATIVO}}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
@stop