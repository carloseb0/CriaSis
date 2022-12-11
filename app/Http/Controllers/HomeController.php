<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $arrGestacoes = \DB::table('gestacao')
                            ->join('animal', 'animal.IDANIMAL', '=', 'gestacao.IDANIMAL')
                            ->select('animal.CODANIMAL','gestacao.DANASCIMENTOESTIMADO',            
                            \DB::raw('(CASE TPCUIDADO 
                                        WHEN "B" 
                                            THEN "green"
                                        WHEN "M"
                                            THEN "yellow"
                                        WHEN "A"
                                            THEN 
                                                "red"
                                    END) AS DSTPCUIDADO'))
                                    ->orderBy('gestacao.TPCUIDADO', 'asc')
                                    ->get();

        $arrPastagem = \DB::table('gerenciamento')
                        ->join('pastagem', 'pastagem.IDPASTAGEM', '=', 'gerenciamento.IDPASTAGEM')
                        ->join('lote', 'gerenciamento.IDLOTE', '=', 'lote.IDLOTE')
                        ->select('pastagem.NMPASTAGEM', 'lote.NMLOTE', 'pastagem.DALIBERACAO', \DB::raw('(CASE pastagem.TPCULTURA
                                                                                                            WHEN "S" 
                                                                                                                THEN "Sorgo"
                                                                                                            WHEN "C"
                                                                                                                THEN "Capim"
                                                                                                            WHEN "G"
                                                                                                                THEN "Gramado"
                                                                                                            END) AS DSTPCULTURA'))
                        ->where('gerenciamento.FLATIVO', '!=', 'N')
                        ->get();

        $arrDietas = \DB::table('gerenciamento')
                        ->join('dieta', 'dieta.IDDIETA', '=', 'gerenciamento.IDDIETA')
                        ->join('racao', 'racao.IDRACAO', '=', 'dieta.IDRACAO')
                        ->join('lote', 'gerenciamento.IDLOTE', '=', 'lote.IDLOTE')
                        ->select('dieta.NMDIETA', 'lote.NMLOTE', 'racao.NMRACAO')
                        ->where('gerenciamento.FLATIVO', '!=', 'N')
                        ->get();

        $arrVacinas = \DB::table('gerenciamento')
                        ->join('gerenciamento_vacinas', 'gerenciamento.IDGERENCIAMENTO', '=', 'gerenciamento_vacinas.IDGERENCIAMENTO')
                        ->join('vacinas', 'vacinas.IDVACINA', '=', 'gerenciamento_vacinas.IDVACINA')
                        ->join('lote', 'gerenciamento.IDLOTE', '=', 'lote.IDLOTE')
                        ->select('gerenciamento_vacinas.DTAPLICACAO', 'vacinas.NMVACINA', 'lote.NMLOTE', 'vacinas.DSFINALIDADE')
                        ->where('gerenciamento.FLATIVO', '!=', 'N')
                        ->get();

        $arrlotes = \DB::table('lote')
                        ->select('lote.NMLOTE', 'lote.created_at', 'lote.IDLOTE')
                        ->where('lote.FLATIVO', '!=', 'N')
                        ->get();


        return view('home.home', ['arrGestacao'=>$arrGestacoes, 'arrPastagens'=>$arrPastagem, 'arrDietas'=>$arrDietas, 'arrVacinas'=>$arrVacinas, 'arrlotes'=>$arrlotes]);
    }
}
