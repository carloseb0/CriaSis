<?php

namespace App\Http\Controllers;

use App\Http\Requests\RacaRequest;
use App\Models\Raca;

class RacaController extends Controller
{
    public function index(){
        // Como fazer get com wherer : Raca::where('FLATIVO', '=', 'S')->get();
        // $arrRacas = Raca::orderBy('NMRACA')
        //                 ->raw("CASE raca.FLATIVO = 'S' THEN Sim ELSE Não END DSFLATIVO")
        //                 ->paginate(5);

        $arrRacas = Raca::select("raca.*",
                                \DB::raw('(CASE 
                                    WHEN FLATIVO = "s" THEN "Sim"
                                    ELSE "Não"
                                    END) AS DSFLATIVO'))
                            ->paginate(10);

        return view('racas.index', ['arrRacas'=>$arrRacas]);
    }

    public function create(){
        return view('racas.create');
    }

    public function store(RacaRequest $request){
        Raca::create($request->all());

        return redirect('racas');
    }

    public function destroy($id){
        try {
            Raca::where('IDRACA', $id)->delete();
			$ret = array('status'=>200, 'msg'=>"null");
		} catch (\Illuminate\Database\QueryException $e) {
			$ret = array('status'=>500, 'msg'=>$e->getMessage());
		} 
		catch (\PDOException $e) {
			$ret = array('status'=>500, 'msg'=>$e->getMessage());
		}
		return $ret;
    }

    public function edit($id){
        $raca = Raca::where('IDRACA', $id)->first();
        return view('racas.edit', compact('raca'));
    }

    public function update(RacaRequest $request, $id){
        $raca = Raca::where('IDRACA', $id)->first();
        $raca->update($request->all());

        return redirect()->route('racas');
    }
}
