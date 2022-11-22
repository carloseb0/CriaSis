@extends('adminlte::page')

@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div>
                <h2>Usuário</h2>
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

    {!! Form::open(['url'=>'vacinas/store']) !!}
    <div class="card-body">
        <div class="row" style='  display: flex; flex-direction: column; align-items: center;'> 
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('name', 'Nome')!!}   
                    {!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('email', 'Email')!!}
                    {!! Form::email('email', null, ['class'=>'form-control', 'required']) !!}                
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('password', 'Senha')!!}
                    {!! Form::text('password', null, ['class'=>'form-control', 'type'=>'password', 'required']) !!}               
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('IDPERFIL', 'Perfil')!!}
                    {!! Form::select('IDPERFIL', App\Models\Perfil::where("FLATIVO", 'S')->orderBy('NMPERFIL')->pluck('NMPERFIL', 'IDPERFIL')->toArray(), null, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer" style="text-align: right;">
        <a class="btn" id="btn-principal" href="{{ route('usuarios') }}"> Voltar</a>
        {!! Form::submit('Salvar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
    </div>
</div>


    {!! Form::close() !!}
@stop