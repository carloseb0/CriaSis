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

    {!! Form::open(array("method"=>"put", 'route'=>["racoes.update", "id"=>$racao->IDRACAO])) !!}
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('NMRACAO', 'Nome')!!}   
                    {!! Form::text('NMRACAO', $racao->NMRACAO, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    {!! Form::label('NMFABRICANTE', 'Fabricante')!!}   
                    {!! Form::text('NMFABRICANTE', $racao->NMFABRICANTE, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('QTKG', 'Qtd. (Sacos)')!!}   
                    {!! Form::number('QTKG', $racao->QTKG, ['class'=>'form-control', 'required']) !!}       
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('DAVALIDADE', 'Validade')!!}   
                    {!! Form::date('DAVALIDADE', $racao->DAVALIDADE, ['class'=>'form-control', 'required']) !!}       
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('FLATIVO', 'Ativo')!!}
                    {!! Form::select('FLATIVO', ['S'=>'Sim', 'N'=>'Não'], $racao->FLATIVO,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('DSRACAO', 'Descrição')!!}
                    {!! Form::textarea('DSRACAO', $racao->DSRACAO, ['class'=>'form-control', 'required', 'rows'=>4]) !!}              
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-right" style="margin-right: 10px;">
            <a class="btn" id="btn-principal" href="{{ route('animais') }}"> Voltar</a>
            {!! Form::submit('Editar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
        </div>
    </div>
</div>


    {!! Form::close() !!}
@stop