@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left">
                <h2>Relatório de Gestações</h2>
            </div>
        </div>
    </div>
    <div class="card-body">

        {!! Form::open(['name'=>'form_name', 'route'=>'relgestacoes']) !!}
            <div calss="sidebar-form">
                <div class="input-group">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            {!! Form::label('TPCUIDADO', 'Cuidado')!!}
                            {!! Form::select('TPCUIDADO', ['B'=>'Baixo', 'M'=>'Médio', 'A'=>'Alto'], null, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                        </div>
                    </div>
                    <span class="input-group-btn">
                        <button type="submit" class="btn" name="search" id="btn-principal" style="margin-top: 12px; padding: 2px 20px;"><i class="fa fa-search"></i>&nbsp;Filtrar</button>
                        <a class="btn"  id="btn-principal" href="{{ route('relgestacoes.exportacao') }}" style="margin-top: 12px;   padding: 2px 20px;"><i class="fa fa-download"></i>&nbsp;Exportar</a>

                    </span>
                </div>
            </div>
        {!! Form::close() !!}
        <br>


        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Animal</th>
                    <th>Lote</th>
                    <th>Cuidado</th>
                    <th>Nascimento Estimado</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrRelGestacoes->isEmpty())
                    @foreach($arrRelGestacoes as $gestacao)  
                        <tr>
                            <td>{{ $gestacao->CODANIMAL}}</td>
                            <td>{{ $gestacao->NMLOTE}}</td>
                            <td>{{ $gestacao->DSTPCUIDADO}}</td>
                            <td>{{ Carbon\Carbon::parse($gestacao->DANASCIMENTOESTIMADO)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                       <td colspan="7" style='text-align: center;'>Nenhum Registro Encontrado</td>
                   </tr>   
               @endif
            </tbody>
        </table>
    </div>
    {{ $arrRelGestacoes->links("pagination::bootstrap-4") }}
</div>
@stop
