@extends('adminlte::page')

@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div>
                <h2>Animal</h2>
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

    {!! Form::open(['url'=>'animais/store']) !!}
    <div class="card-body">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('CODANIMAL', 'Cód Animal')!!}   
                    {!! Form::text('CODANIMAL', null, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('IDRACA', 'Raça')!!}
                    {!! Form::select('IDRACA', App\Models\Raca::where("FLATIVO", 'S')->orderBy('NMRACA')->pluck('NMRACA', 'IDRACA')->toArray(), null, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('TPSEXO', 'Sexo')!!}
                    {!! Form::select('TPSEXO', ['M'=>'Macho', 'F'=>'Fêmea'], null,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}            
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('DANASCIMENTO', 'Nascimento')!!}   
                    {!! Form::date('DANASCIMENTO', null, ['class'=>'form-control', 'required']) !!}       
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <a class="btn" id="btn-principal" href="{{ route('animais') }}"> Voltar</a>
            {!! Form::submit('Salvar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
        </div>
    </div>
</div>

    {!! Form::close() !!}
@stop