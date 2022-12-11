<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lote;
use App\Models\LoteAnimal;
use App\Models\Animal;

class LoteController extends Controller
{
    public function index(){
        $arrlotes = Lote::select("lote.*",
                                \DB::raw('(CASE 
                                    WHEN FLATIVO = "s" THEN "Sim"
                                    ELSE "Não"
                                    END) AS DSFLATIVO'))
                            ->paginate(10);


        return view('lotes.index', ['arrlotes'=>$arrlotes]);
    }

    public function create(){
        return view('lotes.create');
    }

    public function store(Request $request){
        $lote = Lote::create([
                            'NMLOTE' => $request->get('NMLOTE'),
                            'FLATIVO' => $request->get('FLATIVO'),
                            'DSDESCRICAO' => $request->get('DSDESCRICAO')
                        ]);

        $arrAnimais = $request->animais;
        if(!empty($arrAnimais)){
            foreach($arrAnimais as $idAnimal => $value) {
                LoteAnimal::create([
                                'IDLOTE' => $lote->IDLOTE,
                                'IDANIMAL' => $arrAnimais[$idAnimal]
                            ]);
            }
        }

        return redirect()->route('lotes');
    }

    public function destroy($id){
        try {
		    Lote::find($id)->delete();
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
        $lote = Lote::where('IDLOTE', $id)->first();

        return view('lotes.edit', compact('lote'));
    }

    public function update(Request $request, $id){
        $lote = Lote::find($id);
        $lote->update($request->all());

        $arrAnimais = $request->animais;
        if(!empty($arrAnimais)){
            foreach($arrAnimais as $idAnimal => $value) {
                LoteAnimal::update([
                                'IDLOTE' => $lote->IDLOTE,
                                'IDANIMAL' => $arrAnimais[$idAnimal]
                            ])->where($lote->IDLOTE);
            }
        }

        return redirect()->route('lotes');
    }
}
