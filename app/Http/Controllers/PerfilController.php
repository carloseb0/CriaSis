<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerfilRequest;
use App\Models\Perfil;

class PerfilController extends Controller
{
    public function index(){
        $arrPerfis = Perfil::select("perfil.*",
                                \DB::raw('(CASE 
                                    WHEN FLATIVO = "s" THEN "Sim"
                                    ELSE "Não"
                                    END) AS DSFLATIVO'))
                            ->paginate(10);

        return view('perfis.index', ['arrPerfis'=>$arrPerfis]);
    }

    public function create(){
        return view('perfis.create');
    }

    public function store(PerfilRequest $request){
        Perfil::create($request->all());

        return redirect('perfis');
    }

    public function destroy($id){
        Perfil::where('IDPERFIL', $id)->delete();

        return redirect()->route('perfis');
    }

    public function edit($id){
        $perfil = Perfil::where('IDPERFIL', $id)->first();
        return view('perfis.edit', compact('perfil'));
    }

    public function update(PerfilRequest $request, $id){
        $perfil = Perfil::where('IDPERFIL', $id)->first();
        $perfil->update($request->all());

        return redirect()->route('perfis');
    }
}
