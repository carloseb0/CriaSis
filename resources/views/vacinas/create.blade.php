@extends('adminlte::page')

@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div>
                <h2>Vacina</h2>
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
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('NMVACINA', 'Nome')!!}   
                    {!! Form::text('NMVACINA', null, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('NMFABRICANTE', 'Fabricante')!!}
                    {!! Form::text('NMFABRICANTE', null, ['class'=>'form-control', 'required']) !!}                
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('QTDOSE', 'Dose')!!}
                    {!! Form::text('QTDOSE', null, ['class'=>'form-control', 'required']) !!}                
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('DAVALIDADE', 'Validade')!!}   
                    {!! Form::date('DAVALIDADE', null, ['class'=>'form-control', 'required']) !!}       
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('DSFINALIDADE', 'Finalidade')!!}
                    {!! Form::textarea('DSFINALIDADE', null, ['class'=>'form-control', 'required', 'rows'=>8]) !!}               
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer" style="text-align: right;">
        <a class="btn" id="btn-principal" href="{{ route('vacinas') }}"> Voltar</a>
        {!! Form::submit('Salvar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
    </div>
</div>


    {!! Form::close() !!}
@stop