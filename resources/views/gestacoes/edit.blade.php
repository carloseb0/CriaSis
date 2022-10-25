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

    {!! Form::open(array("method"=>"put", 'route'=>["gestacoes.update", "id"=>$gestacao->IDGESTACAO])) !!}
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('IDANIMAL', 'Animal')!!}
                    {!! Form::select('IDANIMAL', App\Models\Animal::orderBy('CODANIMAL')->pluck('CODANIMAL', 'IDANIMAL')->toArray(), $gestacao->IDANIMAL,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('DAINSEMINACAO', 'Dt. Inseminação')!!}   
                    {!! Form::date('DAINSEMINACAO', $gestacao->DAINSEMINACAO, ['class'=>'form-control', 'required']) !!}       
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('DANASCIMENTOESTIMADO', 'Dt. Nascimento Estimado')!!}   
                    {!! Form::date('DANASCIMENTOESTIMADO', $gestacao->DANASCIMENTOESTIMADO, ['class'=>'form-control', 'required']) !!}       
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('TPCUIDADO', 'Cuidado')!!}
                    {!! Form::select('TPCUIDADO', ['Baixo'=>'Baixo', 'Médio'=>'Médio', 'Alto'=>'Alto'], $gestacao->TPCUIDADO,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer" style="text-align: right;">
        <a class="btn btn-primary" href="{{ route('gestacoes') }}"> Voltar</a>
        {!! Form::submit('Editar', ['class'=>'btn btn-primary', 'style'=>'margin-right: 10px; margin-left: 5px;']) !!} 
    </div>
</div>


    {!! Form::close() !!}
@stop