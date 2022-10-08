<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastagemRequest;
use App\Models\Pastagem;;

class PanstagemController extends Controller
{
    public function index(){
        // Como fazer get com wherer : Raca::where('FLATIVO', '=', 'S')->get();
        $arrPastagens = Pastagem::all();

        return view('pastagens.index', ['arrPastagens'=>$arrPastagens]);
    }

    public function create(){
        return view('pastagens.create');
    }

    public function store(PastagemRequest $request){
        Pastagem::create($request->all());

        return redirect('pastagens');
    }
}
