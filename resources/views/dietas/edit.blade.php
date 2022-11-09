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

    {!! Form::open(array("method"=>"put", 'route'=>["dietas.update", "id"=>$dieta->IDDIETA])) !!}
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    {!! Form::label('NMDIETA', 'Nome')!!}   
                    {!! Form::text('NMDIETA', $dieta->NMDIETA, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('TPUSODIETA', 'Uso')!!}
                    {!! Form::select('TPUSODIETA', ['E'=>'Engorda', 'C'=>'Cresciemnto', 'P'=>'Produção'], $dieta->TPUSODIETA,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('IDRACAO', 'Racao')!!}
                    {!! Form::select('IDRACAO', App\Models\Racao::where("FLATIVO", 'S')->orderBy('NMRACAO')->pluck('NMRACAO', 'IDRACAO')->toArray(), $dieta->IDRACAO,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
                </div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('FLATIVO', 'Ativo')!!}
                    {!! Form::select('FLATIVO', ['S'=>'Sim', 'N'=>'Não'], $dieta->FLATIVO, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('DSDIETA', 'Descrição')!!}
                    {!! Form::textarea('DSDIETA', $dieta->DSDIETA, ['class'=>'form-control', 'required', 'rows'=>4]) !!}                
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-right" style="margin-right: 10px;">
            <a class="btn" id="btn-principal" href="{{ route('dietas') }}"> Voltar</a>
            {!! Form::submit('Salvar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
        </div>
    </div>
</div>


    {!! Form::close() !!}
@stop