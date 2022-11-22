@extends('layouts.default')

@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div>
                <h2>Perfil</h2>
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

    @if(session('mensagem'))
        <div class="alert alert-success">
            <p>{{session('mensagem')}}</p>
        </div>
    @endif

    {!! Form::open(['url'=>'perfis/store']) !!}
    <div class="card-body">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('NMPERFIL', 'Nome')!!}   
                    {!! Form::text('NMPERFIL', null, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('FLATIVO', 'Ativo')!!}
                    {!! Form::select('FLATIVO', ['S'=>'Sim', 'N'=>'Não'], null,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('DSDESCRICAO', 'Descrição')!!}
                    {!! Form::textarea('DSDESCRICAO', null, ['class'=>'form-control', 'required', 'rows'=>4]) !!}              
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <a class="btn" id="btn-principal" href="{{ route('perfis') }}"> Voltar</a>
            {!! Form::submit('Salvar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
        </div>
    </div>
</div>

    {!! Form::close() !!}
@stop