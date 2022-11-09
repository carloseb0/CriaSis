@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left">
                <h2>Usuários</h2>
            </div>
            <div class="pull-right">
                <a class="btn" id="btn-principal" href="{{ route('usuarios.create') }}">Novo Registro</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Cód.</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    <th width="10%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrUsuarios->isEmpty())
                    @foreach($arrUsuarios as $usuario)  
                        <tr>
                            <td>{{ $usuario->id}}</td>
                            <td>{{ $usuario->name}}</td>
                            <td>{{ $usuario->email}}</td>
                            @if($usuario->perfil)
                                <td>{{$usuario->perfil->NMPERFIL}}</td>
                            @else
                                <td>Nenhum Perfil Vinculado</td>
                            @endif
                            <td style="display: flex; justify-content: center; padding: 9px;">
                                <a href="{{ route('usuarios.edit', ['id'=>$usuario->id]) }}"  title='Editar' id="btn-tarefas"class="fa fa-edit" style="margin-right: 10px"></a>
                                <a href="#" onclick="return ConfirmaExclusao({{$usuario->id}})" class="fa fa-trash" id="btn-tarefas"title="Remover"></a>
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
    {{ $arrUsuarios->links("pagination::bootstrap-4") }}
</div>
@stop

@section('table-delete')
"usuarios"
@endsection