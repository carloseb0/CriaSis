@extends('adminlte::page')

@section('content')
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div>
                <h2>Lote Animais</h2>
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

    {!! Form::open(['url'=>'lotes/store']) !!}
    <div class="card-body">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('NMLOTE', 'Nome')!!}   
                    {!! Form::text('NMLOTE', null, ['class'=>'form-control', 'required']) !!}
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('FLATIVO', 'Ativo')!!}
                    {!! Form::select('FLATIVO', ['S'=>'Sim', 'N'=>'Não'], null,['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                           
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('DSDESCRICAO', 'Descrição')!!}
                    {!! Form::textarea('DSDESCRICAO', null, ['class'=>'form-control', 'required', 'rows'=>4]) !!}                
                </div>
            </div>

            <fieldset>
                <legend class="legend">Animais</legend>
                    <table class='table talbe-stipe table-bordered table-hover table-sm'>
                        <thead>
                            <tr>
                                <th colspan="2" style="display: flex; flex-wrap: wrap; flex-direction: column;"><button class="add_field_button btn-add" title="Adicionar" id='btnAdicionarAnimal'>Adicionar</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id='tr-animal'>
                            </tr>
                        </tbody>
                    </table>
            </fieldset>
        </div>
    </div>
    
    <div class="card-footer">
        <div class="col-xs-12 col-sm-12 col-md-12 text-right">
            <a class="btn" id="btn-principal" href="{{ route('lotes') }}"> Voltar</a>
            {!! Form::submit('Salvar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
        </div>
    </div>
</div>

    {!! Form::close() !!}
@stop

@section('js')
<script>
    $(document).ready(function(){
        var wrapper = $("#tr-animal");
        var add_button = $(".add_field_button");
        var x=0;
        $(add_button).click(function(e){
        x++;
        var newField = '<div id="divMasterDetail"><div style="width:94%; float:left" id="animal">{!! Form::select("animais[]", App\Models\Animal::orderBy("CODANIMAL")->pluck("CODANIMAL", "IDANIMAL")->toArray(), null,["class"=>"form-control", "required", "placeholder"=>"Selecione:"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';
        $(wrapper).append(newField);
    });
    $(wrapper).on("click",".remove_field", function(e){
        e.preventDefault(); 
        $(this).parent('div').remove(); 
        x--;
    });
    })
</script>
@stop