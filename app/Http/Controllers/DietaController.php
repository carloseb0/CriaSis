<?php

namespace App\Http\Controllers;

use App\Http\Requests\DietaRequest;
use App\Models\Dieta;

class DietaController extends Controller
{
    public function index(){
        // Como fazer get com wherer : Raca::where('FLATIVO', '=', 'S')->get();
        // $arrDietas = Dieta::orderBy('NMDIETA')->paginate(10);

        $arrDietas = Dieta::select("dieta.*",
                                    \DB::raw('(CASE 
                                        WHEN FLATIVO = "s" THEN "Sim"
                                        ELSE "Não"
                                        END) AS DSFLATIVO'),
                                    \DB::raw('(CASE TPUSODIETA
                                        WHEN "E" 
                                            THEN "Engorda"
                                        WHEN "C"
                                            THEN "Crescimento"
                                        WHEN "P"
                                            THEN "Produção"
                                        END) AS DSTPUSODIETA'))
                                ->paginate(10);

        return view('dietas.index', ['arrDietas'=>$arrDietas]);
    }

    public function create(){
        return view('dietas.create');
    }

    public function store(DietaRequest $request){
        Dieta::create($request->all());

        return redirect()->route('dietas');
    }

    public function destroy($id){
        Dieta::where('IDDIETA', $id)->delete();

        return redirect()->route('dietas');
    }

    public function edit($id){
        $dieta = Dieta::where('IDDIETA', $id)->first();
        return view('dietas.edit', compact('dieta'));
    }

    public function update(DietaRequest $request, $id){
        $dieta = Dieta::where('IDDIETA', $id)->first();
        $dieta->update($request->all());

        return redirect()->route('dietas');
    }
}
