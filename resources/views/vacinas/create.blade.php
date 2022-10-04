@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cadastrar Vacina</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('vacinas.index') }}"> Voltar</a>
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

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('NMVACINA', 'Nome')!!}   
                {!! Form::text('NMVACINA', null, ['class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('DSFINALIDADE', 'Finalidade')!!}
                {!! Form::text('DSFINALIDADE', null, ['class'=>'form-control', 'required']) !!}                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('NMFABRICANTE', 'Fabricante')!!}
                {!! Form::text('NMFABRICANTE', null, ['class'=>'form-control', 'required']) !!}                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('QTDOSE', 'Dose')!!}
                {!! Form::text('QTDOSE', null, ['class'=>'form-control', 'required']) !!}                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('DAVALIDADE', 'Validade')!!}   
                {!! Form::date('DAVALIDADE', null, ['class'=>'form-control', 'required']) !!}       
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!} 
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    </div>


    {!! Form::close() !!}
@stop