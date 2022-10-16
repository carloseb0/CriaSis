@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left" style='margin: 10px;'>
                <h2>Editar Pastagem</h2>
            </div>
            <div class="pull-right" style='margin: 10px;'>
                <a class="btn btn-primary" href="{{ route('pastagens') }}"> Voltar</a>
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

    {!! Form::open(array("method"=>"put", 'route'=>["pastagens.update", "id"=>$pastagem->IDPASTAGEM])) !!}
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('NMPASTAGEM', 'Nome')!!}   
                {!! Form::text('NMPASTAGEM', $pastagem->NMPASTAGEM, ['class'=>'form-control', 'required']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('DSPASTAGEM', 'Descrição')!!}
                {!! Form::text('DSPASTAGEM', $pastagem->DSPASTAGEM, ['class'=>'form-control', 'required']) !!}                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('TPCULTURA', 'Cultura')!!}
                {!! Form::select('TPCULTURA', ['Sorgo'=>'Sorgo', 'Capim'=>'Capim', 'Gramado'=>'Gramado'], $pastagem->TPCULTURA, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {!! Form::label('FLATIVO', 'Ativo')!!}
                {!! Form::select('FLATIVO', ['S'=>'Sim', 'N'=>'Não'], $pastagem->FLATIVO, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!} 
            {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
        </div>
    </div>


    {!! Form::close() !!}
@stop