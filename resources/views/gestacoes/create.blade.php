@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Cadastrar Gestação</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-primary" href="{{ route('gestacoes') }}"> Voltar</a>
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

    {!! Form::open(['route'=>'gestacoes.store']) !!}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('IDANIMAL', 'Animal')!!}
                {!! Form::select('IDANIMAL', ['E'=>'Engorda', 'C'=>'Crescimento', 'P'=>'Produção'], null,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('DAINSEMINACAO', 'Dt. Inseminação')!!}   
                {!! Form::date('DAINSEMINACAO', null, ['class'=>'form-control', 'required']) !!}       
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('DANASCIMENTOESTIMADO', 'Dt. Nascimento Estimado')!!}   
                {!! Form::date('DANASCIMENTOESTIMADO', null, ['class'=>'form-control', 'required']) !!}       
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('TPCUIDADO', 'Cuidado')!!}
                {!! Form::select('TPCUIDADO', ['Baixo'=>'Baixo', 'Médio'=>'Médio', 'Alto'=>'Alto'], null,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!} 
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    </div>


    {!! Form::close() !!}
@stop