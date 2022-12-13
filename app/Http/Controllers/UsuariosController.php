<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\User;

class UsuariosController extends Controller
{
    public function index(){
        $arrUsuarios = User::where('id', "!=", 0)->orderBy('id')->paginate(15);

        return view('usuarios.index', ['arrUsuarios'=>$arrUsuarios]);
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(UsuarioRequest $request){
        $nova_Racao = $request->all();
        User::create($nova_Racao);

        return redirect('usuarios')->with('mensagem', 'Cadastrado com sucesso!');
    }

    public function destroy($id){
        User::find($id)->delete();

        return redirect()->route('usuarios');
    }

    public function edit($id){
        $usuario = User::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(UsuarioRequest $request, $id){
        $usuario = User::find($id);
        $usuario->update($request->all());

        return redirect()->route('usuarios');
    }
}
