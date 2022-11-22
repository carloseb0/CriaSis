@extends('adminlte::page')

@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left">
                <h2>Alterar</h2>
            </div>
        </div>
    </div>

    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error}}</li>                
            @endforeach
        </ul>
    @endif

    {!! Form::open(array("method"=>"put", 'route'=>["usuarios.update", "id"=>$usuario->id])) !!}
    @csrf
    <div class="card-body">
        <div class="row" style='  display: flex; flex-direction: column; align-items: center;'> 
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('name', 'Nome')!!}   
                    {!! Form::text('name', $usuario->name, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('email', 'Email')!!}
                    {!! Form::email('email', $usuario->email, ['class'=>'form-control', 'required']) !!}                
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('password', 'Senha')!!}
                    {!! Form::text('password', $usuario->password, ['class'=>'form-control', 'required', 'rows'=>4]) !!}               
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('IDPERFIL', 'Perfil')!!}
                    {!! Form::select('IDPERFIL', App\Models\Perfil::where("FLATIVO", 'S')->orderBy('NMPERFIL')->pluck('NMPERFIL', 'IDPERFIL')->toArray(), $usuario->IDPERFIL, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer" style="text-align: right;">
        <a class="btn" id="btn-principal" href="{{ route('usuarios') }}"> Voltar</a>
        {!! Form::submit('Editar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
    </div>
</div>

    {!! Form::close() !!}
@stop