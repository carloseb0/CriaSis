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

    {!! Form::open(array("method"=>"put", 'route'=>["animais.update", "id"=>$animal->IDANIMAL])) !!}
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('CODANIMAL', 'Cód Animal')!!}   
                    {!! Form::text('CODANIMAL', $animal->CODANIMAL, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('IDRACA', 'Raça')!!}
                    {!! Form::select('IDRACA', App\Models\Raca::where("FLATIVO", 'S')->orderBy('NMRACA')->pluck('NMRACA', 'IDRACA')->toArray(), $animal->IDRACA, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('TPSEXO', 'Sexo')!!}
                    {!! Form::select('TPSEXO', ['M'=>'Macho', 'F'=>'Fêmea'], $animal->TPSEXO,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}            
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('DANASCIMENTO', 'Nascimento')!!}   
                    {!! Form::date('DANASCIMENTO', $animal->DANASCIMENTO, ['class'=>'form-control', 'required']) !!}       
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-right" style="margin-right: 10px;">
            <a class="btn btn-primary" href="{{ route('animais') }}"> Voltar</a>
            {!! Form::submit('Editar', ['class'=>'btn btn-primary', 'style'=>'margin-right: 10px; margin-left: 5px;']) !!} 
        </div>
    </div>
</div>


    {!! Form::close() !!}
@stop