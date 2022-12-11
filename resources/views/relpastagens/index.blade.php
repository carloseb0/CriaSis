<?php 
use App\Models\LoteAnimal;
?>

@extends('layouts.default')
@section('content')
<link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
<link href="{{ asset('../css/app.css') }}" rel="stylesheet">
<div class="card">
    <div class="card-header">
        <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
            <div class="pull-left">
                <h2>Relatório de Pastagens</h2>
            </div>
        </div>
    </div>
    <div class="card-body">

        {!! Form::open(['name'=>'form_name', 'route'=>'relpastagens']) !!}
            <div calss="sidebar-form">
                <div class="input-group">
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            {!! Form::label('IDLOTE', 'Lote')!!}
                            {!! Form::select('IDLOTE', App\Models\Lote::where("FLATIVO", 'S')->orderBy('NMLOTE')->pluck('NMLOTE', 'IDLOTE')->toArray(), null, ['class'=>'form-control', 'required', 'placeholder'=>'Selecione:']) !!}                
                        </div>
                    </div>
                    <span class="input-group-btn">
                        <button type="submit" class="btn" name="search" id="btn-principal" style="margin-top: 12px; padding: 2px 20px;"><i class="fa fa-search"></i>&nbsp;Filtrar</button>
                        <a class="btn"  id="btn-principal" href="{{ route('relpastagens.exportacao') }}" style="margin-top: 12px;   padding: 2px 20px;"><i class="fa fa-download"></i>&nbsp;Exportar</a>

                    </span>
                </div>
            </div>
        {!! Form::close() !!}
        <br>


        <table class='table talbe-stipe table-bordered table-hover table-sm'>
            <thead>
                <tr>
                    <th>Pastagem</th>
                    <th>Lote Animais</th>
                    <th>Cultura</th>
                    <th>Qt. Animais</th>
                    <th>Dt. Liberaçao</th>
                </tr>
            </thead>
            <tbody>
                @if(!$arrPastagem->isEmpty())
                    @foreach($arrPastagem as $pastagem)  
                        <tr>
                            <td>{{ $pastagem->NMPASTAGEM}}</td>
                            <td>{{ $pastagem->NMLOTE}}</td>
                            <td>{{ $pastagem->DSTPCULTURA}}</td>
                            <td>{{LoteAnimal::where('IDLOTE', '=', $pastagem->IDLOTE)->count()}}</td>
                            <td>{{ Carbon\Carbon::parse($pastagem->DALIBERACAO)->format('d/m/Y') }}</td>
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
    {{ $arrPastagem->links("pagination::bootstrap-4") }}
</div>
@stop
