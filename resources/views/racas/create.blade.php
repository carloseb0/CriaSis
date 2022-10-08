@extends('adminlte::page')
@auth
    
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Cadastro Raças</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-primary" href="{{ route('racas.index') }}"> Voltar</a>
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

    {!! Form::open(['url'=>'racas/store']) !!}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('NMRACA', 'Nome')!!}
                {!! Form::text('NMRACA', null, ['class'=>'form-control', 'required']) !!}                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('FLATIVO', 'Ativo')!!}
                {!! Form::select('FLATIVO', ['S'=>'Sim', 'N'=>'Não'], null,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!} 
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    </div>


    {!! Form::close() !!}
    @endauth
@stop