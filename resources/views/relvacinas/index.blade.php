@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left">
                <h2>Relatório de Vacinas</h2>
            </div>
        </div>
    </div>
    <div class="card-body">

        {!! Form::open(['name'=>'form_name', 'route'=>'relvacinas']) !!}
            <div calss="sidebar-form">
                <div class="input-group">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            {!! Form::label('IDLOTE', 'Lote')!!}
                            {!! Form::select('IDLOTE', App\Models\Lote::where("FLATIVO", 'S')->orderBy('NMLOTE')->pluck('NMLOTE', 'IDLOTE')->toArray(), null, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                        </div>
                    </div>
                    <span class="input-group-btn">
                        <button type="submit" class="btn" name="search" id="btn-principal" style="margin-top: 12px; padding: 2px;"><i class="fa fa-search"></i>&nbsp;Filtrar</button>
                        <a class="btn"  id="btn-principal" href="{{ route('relvacinas.exportacao') }}" style="margin-top: 12px; padding: 2px;"><i class="fa fa-file-export"></i>&nbsp;Exportar</a>

                    </span>
                </div>
            </div>
        {!! Form::close() !!}
        <br>


        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Lote</th>
                    <th>Vacina</th>
                    <th>Finalidade</th>
                    <th>Dt. Aplicação</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrVacinas->isEmpty())
                    @foreach($arrVacinas as $vacina)  
                        <tr>
                            <td>{{ $vacina->NMLOTE}}</td>
                            <td>{{ $vacina->NMVACINA}}</td>
                            <td>{{ $vacina->DSFINALIDADE}}</td>
                            <td>{{ Carbon\Carbon::parse($vacina->DTAPLICACAO)->format('d/m/Y') }}</td>
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
    {{ $arrVacinas->links("pagination::bootstrap-4") }}
</div>
@stop
