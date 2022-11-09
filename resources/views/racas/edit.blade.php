@extends('adminlte::page')

@section('content')
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

    {!! Form::open(array("method"=>"put", 'route'=>["racas.update", "id"=>$raca->IDRACA])) !!}
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('NMRACA', 'Nome')!!}
                    {!! Form::text('NMRACA', $raca->NMRACA, ['class'=>'form-control', 'required']) !!}                
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('FLATIVO', 'Ativo')!!}
                    {!! Form::select('FLATIVO', ['S'=>'Sim', 'N'=>'Não'], $raca->FLATIVO,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer" style="text-align: right;">
        <a class="btn" id="btn-principal" href="{{ route('animais') }}"> Voltar</a>
        {!! Form::submit('Editar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
    </div>
</div>



    {!! Form::close() !!}
@stop