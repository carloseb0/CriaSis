<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Requests\AnimalRequest;

class AnimalController extends Controller
{
    public function index(){
        // $arrAnimais = Animal::orderBy('CODANIMAL')->paginate(10);

        $arrAnimais = Animal::select("animal.*",
                                    \DB::raw('(CASE 
                                        WHEN TPSEXO = "M" 
                                            THEN "Macho"
                                        ELSE "Fêmea"
                                        END) AS DSTPSEXO'))
                                ->paginate(20);

        return view('animais.index', ['arrAnimais'=>$arrAnimais]);
    }

    public function create(){
        return view('animais.create');
    }

    public function store(AnimalRequest $request){
        $novo_Animal = $request->all();
        Animal::create($novo_Animal );

        return redirect('animais');
    }

    public function destroy($id){
        try {
		    Animal::where('IDANIMAL', $id)->delete();
			$ret = array('status'=>200, 'msg'=>"null");
		} catch (\Illuminate\Database\QueryException $e) {
			$ret = array('status'=>500, 'msg'=>$e->getMessage());
		} 
		catch (\PDOException $e) {
			$ret = array('status'=>500, 'msg'=>$e->getMessage());
		}
		return $ret;

        return redirect()->route('animais');
    }

    public function edit($id){
        $animal = Animal::where('IDANIMAL', $id)->first();
        return view('animais.edit', compact('animal'));
    }

    public function update(AnimalRequest $request, $id){
        $animal = Animal::where('IDANIMAL', $id)->first();
        $animal->update($request->all());

        return redirect()->route('animais');
    }
}
