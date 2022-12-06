<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastagemRequest;
use App\Models\Pastagem;

class PanstagemController extends Controller
{
    public function index(){
        // Como fazer get com wherer : Raca::where('FLATIVO', '=', 'S')->get();
        // $arrPastagens = Pastagem::orderBy('NMPASTAGEM')->paginate(10);
        $arrPastagens = Pastagem::select("pastagem.*",
                                        \DB::raw('(CASE 
                                            WHEN FLATIVO = "s" THEN "Sim"
                                            ELSE "Não"
                                            END) AS DSFLATIVO'),
                                        \DB::raw('(CASE TPCULTURA
                                            WHEN "S" 
                                                THEN "Sorgo"
                                            WHEN "C"
                                                THEN "Capim"
                                            WHEN "G"
                                                THEN "Gramado"
                                            END) AS DSTPCULTURA'))
                                    ->paginate(10);

        return view('pastagens.index', ['arrPastagens'=>$arrPastagens]);
    }

    public function create(){
        return view('pastagens.create');
    }

    public function store(PastagemRequest $request){
        Pastagem::create($request->all());

        return redirect('pastagens');
    }

    public function destroy($id){
        Pastagem::where('IDPASTAGEM', $id)->delete();

        return redirect()->route('pastagens');
    }

    public function edit($id){
        $pastagem = Pastagem::where('IDPASTAGEM', $id)->first();
        return view('pastagens.edit', compact('pastagem'));
    }

    public function update(PastagemRequest $request, $id){
        $pastagem = Pastagem::where('IDPASTAGEM', $id)->first();
        $pastagem->update($request->all());

        return redirect()->route('pastagens');
    }
}
