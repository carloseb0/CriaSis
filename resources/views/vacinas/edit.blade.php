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

    {!! Form::open(array("method"=>"put", 'route'=>["vacinas.update", "id"=>$vacina->IDVACINA])) !!}
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('NMVACINA', 'Nome')!!}   
                    {!! Form::text('NMVACINA', $vacina->NMVACINA, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('NMFABRICANTE', 'Fabricante')!!}
                    {!! Form::text('NMFABRICANTE', $vacina->NMFABRICANTE, ['class'=>'form-control', 'required']) !!}                
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('QTDOSE', 'Dose')!!}
                    {!! Form::text('QTDOSE', $vacina->QTDOSE, ['class'=>'form-control', 'required']) !!}                
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('DAVALIDADE', 'Validade')!!}   
                    {!! Form::date('DAVALIDADE', $vacina->DAVALIDADE, ['class'=>'form-control', 'required']) !!}       
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('DSFINALIDADE', 'Finalidade')!!}
                    {!! Form::textarea('DSFINALIDADE', $vacina->DSFINALIDADE, ['class'=>'form-control', 'required', 'rows'=>4]) !!}           
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer" style="text-align: right;">
        <a class="btn btn-primary" href="{{ route('vacinas') }}"> Voltar</a>
        {!! Form::submit('Editar', ['class'=>'btn btn-primary', 'style'=>'margin-right: 10px; margin-left: 5px;']) !!} 
    </div>
</div>

    {!! Form::close() !!}
@stop