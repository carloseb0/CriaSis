@extends('adminlte::page')

@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
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

    {!! Form::open(array("method"=>"put", 'route'=>["gerenciamentos.update", "id"=>$gerenciamento->IDGERENCIAMENTO])) !!}
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('IDLOTE', 'Lote')!!}
                    {!! Form::select('IDLOTE', App\Models\Lote::where("FLATIVO", 'S')->orderBy('NMLOTE')->pluck('NMLOTE', 'IDLOTE')->toArray(), $gerenciamento->IDLOTE, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('IDDIETA', 'Dieta')!!}
                    {!! Form::select('IDDIETA', App\Models\Dieta::where("FLATIVO", 'S')->orderBy('NMDIETA')->pluck('NMDIETA', 'IDDIETA')->toArray(), $gerenciamento->IDDIETA, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                </div>
            </div>

            <div class="col-xs-2 col-sm-2 col-md-2">
                <div class="form-group">
                    {!! Form::label('IDPASTAGEM', 'Pastagem')!!}
                    {!! Form::select('IDPASTAGEM', App\Models\Pastagem::where("FLATIVO", 'S')->orderBy('NMPASTAGEM')->pluck('NMPASTAGEM', 'IDPASTAGEM')->toArray(), $gerenciamento->IDPASTAGEM, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('DSOBSERVACOES', 'Observações')!!}
                    {!! Form::textarea('DSOBSERVACOES', $gerenciamento->DSOBSERVACOES, ['class'=>'form-control', 'required', 'rows'=>8]) !!}               
                </div>
            </div>

            
            <fieldset>
                <legend class="legend">Vacinas</legend>
                    <table class='table talbe-stipe table-bordered table-hover table-sm'>
                        <thead>
                            <tr>
                                <th colspan="2" style="display: flex; flex-wrap: wrap; flex-direction: column;"><button class="add_field_button btn-add" title="Adicionar" id='btnAdicionarAnimal'>Adicionar</button></th>
                            </tr>
                        </thead>
                        <tbody id='body'>

                            @foreach($gerenciamento->vacinas as $a)
                                <tr id='tr-vacina'>
                                    <td>{{ $a->vacina->NMVACINA}}</td>
                                    <td style="width: 35px; padding: 1px; text-align: end;"> <a href="#" onclick="return ConfirmaExclusao({{$gerenciamento->IDGERENCIAMENTOVACINA}})" class="fa fa-trash" id="btn-tarefas"  id="btn-tarefas"title="Remover"></a> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </fieldset>


        </div>
    </div>
    <div class="card-footer" style="text-align: right;">
        <a class="btn" id="btn-principal" href="{{ route('gerenciamentos') }}"> Voltar</a>
        {!! Form::submit('Salvar', ['class'=>'btn', "id"=>"btn-principal", 'style'=>'margin-right: 10px; margin-left: 5px;']) !!}
    </div>
</div>

    {!! Form::close() !!}
@stop


@section('js')
<script>
    $(document).ready(function(){
        var wrapper = $("#body");
        var add_button = $(".add_field_button");
        var x=0;
        $(add_button).click(function(e){
        x++;
        var newField = '<div id="divMasterDetail"><div style="width:95%; float:left; display: flex;" id="vacina"><tr>{!! Form::select("vacinas[]", App\Models\Vacina::orderBy("NMVACINA")->pluck("NMVACINA", "IDVACINA")->toArray(), null,["class"=>"form-control", "required", "placeholder"=>"Selecione:"]) !!} <div style="width:40%; margin-left: 10px;">{!! Form::date("DTAPLICACAO", null, ["name"=>"dataaplica[]", "class"=>"form-control", "required"]) !!}  </div></div><button type="button" class="remove_field btn btn-danger btn-circle" style="background: red;"><i class="fa fa-times"></button></div></tr>';
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