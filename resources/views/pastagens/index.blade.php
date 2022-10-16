@extends('adminlte::page')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Pastagens</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-info" href="{{ route('pastagens.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>

    <table class='table talbe-stipe table-bordered table-hover table-sm'>
        <thead class='table-dark'>
            <tr>
                <th>Cód.</th>
                <th>Nome</th>
                <th>Cultura</th>
                <th>Dt. Liberação</th>
                <th>Ativo</th>
                <th width="10%">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arrPastagens as $pastagem)  
                <tr>
                    <td>{{ $pastagem->IDPASTAGEM}}</td>
                    <td>{{ $pastagem->NMPASTAGEM}}</td>
                    <td>{{ $pastagem->TPCULTURA}}</td>
                    <td>{{ Carbon\Carbon::parse($pastagem->DALIBERACAO)->format('d/m/Y') }}</td>
                    <td>{{ $pastagem->FLATIVO}}</td>
                    <td style="display: flex; justify-content: center; padding: 9px;">
                        <a href="{{ route('pastagens.edit', ['id'=>$pastagem->IDPASTAGEM]) }}" title='Editar' class="fa fa-edit" style="margin-right: 10px"></a>
                        <a href="#" onclick="return ConfirmaExclusao({{$pastagem->IDPASTAGEM}})" class="fa fa-trash" title="Remover"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    
@stop