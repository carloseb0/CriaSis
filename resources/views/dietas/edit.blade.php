@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Editar Dieta</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-primary" href="{{ route('dietas') }}"> Voltar</a>
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

    {!! Form::open(array("method"=>"put", 'route'=>["dietas.update", "id"=>$dieta->IDDIETA])) !!}
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('NMDIETA', 'Nome')!!}   
                {!! Form::text('NMDIETA', $dieta->NMDIETA, ['class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('DSDIETA', 'Descrição')!!}
                {!! Form::text('DSDIETA', $dieta->DSDIETA, ['class'=>'form-control', 'required']) !!}                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('TPUSODIETA', 'Uso')!!}
                {!! Form::select('TPUSODIETA', ['E'=>'Engorda', 'C'=>'Cresciemnto'], $dieta->TPUSODIETA,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('NMRACAO', 'Ração')!!}
                {!! Form::text('NMRACAO', $dieta->NMRACAO, ['class'=>'form-control', 'required']) !!}                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('FLATIVO', 'Ativo')!!}
                {!! Form::select('FLATIVO', ['S'=>'Sim', 'N'=>'Não'], $dieta->FLATIVO, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!} 
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    </div>


    {!! Form::close() !!}
@stop