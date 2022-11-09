@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div>
                <h2>Perfil</h2>
            </div>
            <div>
                <a class="btn" id="btn-principal" href="{{ route('perfis.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>Ativo</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrPerfis->isEmpty())
                    @foreach($arrPerfis as $perfil)  
                        <tr>
                            <td>{{ $perfil->IDPERFIL}}</td>
                            <td>{{ $perfil->NMPERFIL}}</td>
                            <td>{{ $perfil->DSFLATIVO}}</td>
                            <td style="display: flex; justify-content: center; padding: 8px;">
                                <a href="{{ route('perfis.edit', ['id'=>$perfil->IDPERFIL]) }}" title='Editar' id="btn-tarefas"class="fa fa-edit" style="margin-right: 10px"></a>
                                <a href="#" onclick="return ConfirmaExclusao({{$perfil->IDPERFIL}})" class="fa fa-trash" id="btn-tarefas"title="Remover"></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                     <tr>
                        <td colspan="4" style='text-align: center;'>Nenhum Registro Encontrado</td>
                    </tr>   
                @endif
            </tbody>
        </table>
    </div>
    {{ $arrPerfis->links("pagination::bootstrap-4") }}
</div>
@stop

@section('table-delete')
"perfis"
@endsection