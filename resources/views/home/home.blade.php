<?php

use App\Models\LoteAnimal;

?>
@extends('layouts.default')
    @section('content')
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> --}}
    <link href="{{ asset('../css/padrao.css') }}" rel="stylesheet">
    <link href="{{ asset('../css/app.css') }}" rel="stylesheet">

    
    <div class="card" >   

        <div class="card-header">
            <div class="col-lg-12 margin-tb" style='display: flex; justify-content: space-between;'>
                <div class="pull-left">
                    <h1 style="padding: 15px; text-align: center">Bem Vindo, {{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div>

        <div class="card-body">
            <section class="content">
                <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row" style='display: flex; justify-content: space-evenly;'>
                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box">
                            <div class="inner">
                                <p>Lotes Pastagem</p>
                                <table class='table talbe-stipe table-bordered table-hover table-sm'>
                                    <thead>
                                        <tr>
                                            <th>Pastagem</th>
                                            <th>Lote Animais</th>
                                            <th>Dt. Liberaçao</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$arrPastagens->isEmpty())
                                            @foreach($arrPastagens as $pastagem)  
                                                <tr>
                                                    <td>{{ $pastagem->NMPASTAGEM}}</td>
                                                    <td>{{ $pastagem->NMLOTE}}</td>
                                                    <td>{{ Carbon\Carbon::parse($pastagem->DALIBERACAO)->format('d/m/Y') }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" style='text-align: center;'>Nenhum Registro Encontrado</td>
                                            </tr>   
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('relpastagens') }}" class="small-box-footer bg-success" title="Gerenciar"><i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box">
                            <div class="inner">
                                <p>Dieta</p>
                                <table class='table talbe-stipe table-bordered table-hover table-sm'>
                                    <thead>
                                        <tr>
                                            <th>Dieta</th>
                                            <th>Lote Animais</th>
                                            <th>Ração</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$arrDietas->isEmpty())
                                            @foreach($arrDietas as $dieta)  
                                                <tr>
                                                    <td>{{ $dieta->NMDIETA}}</td>
                                                    <td>{{ $dieta->NMLOTE}}</td>
                                                    <td>{{ $dieta->NMRACAO}}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" style='text-align: center;'>Nenhum Registro Encontrado</td>
                                            </tr>   
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('gerenciamentos') }}" class="small-box-footer bg-success" title="Gerenciar"><i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box">
                            <div class="inner">
                                <p>Vacinas</p>
                                <table class='table talbe-stipe table-bordered table-hover table-sm'>
                                    <thead>
                                        <tr>
                                            <th>Vacina</th>
                                            <th>Lote Animal</th>
                                            <th>Dt Aplicação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$arrVacinas->isEmpty())
                                            @foreach($arrVacinas as $vacina)  
                                                <tr>
                                                    <td>{{ $vacina->NMVACINA}}</td>
                                                    <td>{{ $vacina->NMLOTE}}</td>
                                                    <td>{{ Carbon\Carbon::parse($vacina->DTAPLICACAO)->format('d/m/Y') }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" style='text-align: center;'>Nenhum Registro Encontrado</td>
                                            </tr>   
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('relvacinas') }}" class="small-box-footer bg-success" title="Gerenciar"><i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box">
                            <div class="inner">
                                <p>Gestações</p>
                                <table class='table talbe-stipe table-bordered table-hover table-sm'>
                                    <thead>
                                        <tr>
                                            <th>Animal</th>
                                            <th>Nascimento Estimado</th>
                                            <th width="20px">Cuidado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$arrGestacao->isEmpty())
                                            @foreach($arrGestacao as $gestacao)  
                                                <tr>
                                                    <td>{{ $gestacao->CODANIMAL}}</td>
                                                    <td>{{ Carbon\Carbon::parse($gestacao->DANASCIMENTOESTIMADO)->format('d/m/Y') }}</td>
                                                    <td style='text-align: center;'><i style="color: {{ $gestacao->DSTPCUIDADO}};"class="fa fa-circle"></i></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" style='text-align: center;'>Nenhum Registro Encontrado</td>
                                            </tr>   
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('relgestacoes') }}" class="small-box-footer bg-success" title="Gerenciar"><i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-4">
                        <!-- small box -->
                        <div class="small-box">
                            <div class="inner">
                                <p>Lotes Animais</p>
                                <table class='table talbe-stipe table-bordered table-hover table-sm'>
                                    <thead>
                                        <tr>
                                            <th>Lote</th>
                                            <th>Qt. Animais</th>
                                            <th>Dt. Criação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$arrlotes->isEmpty())
                                            @foreach($arrlotes as $lote)  
                                                <tr>
                                                    <td>{{ $lote->NMLOTE}}</td>
                                                    <td style='text-align: center;'>{{LoteAnimal::where('IDLOTE', '=', $lote->IDLOTE)->count()}}</td>
                                                    <td>{{ Carbon\Carbon::parse($lote->created_at)->format('d/m/Y') }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3" style='text-align: center;'>Nenhum Registro Encontrado</td>
                                            </tr>   
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('lotes') }}" class="small-box-footer bg-success" title="Gerenciar"><i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</div>
@stop
