<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacinaRequest;
use App\Models\Vacina;

class VacinaController extends Controller
{
    public function index(){
        $arrVacinas = Vacina::all();

        return view('vacinas.index', ['arrVacinas'=>$arrVacinas]);
    }

    public function create(){
        return view('vacinas.create');
    }

    public function store(VacinaRequest $request){
        Vacina::create($request->all());

        return redirect('vacinas');
    }
}
