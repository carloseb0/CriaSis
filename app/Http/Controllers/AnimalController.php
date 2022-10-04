<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Requests\AnimalRequest;

class AnimalController extends Controller
{
    public function index(){
        $arrAnimais = Animal::all();

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
}
