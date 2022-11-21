<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;

class categoriacontroller extends Controller
{
    public function getCategoria(){
        return response()->json(categoria::all(),200);
    }

    public function getCategoriaXid($id){
        $categoria=categoria::find($id);
        if(is_null($categoria)){
            return response()->json(['Mensaje'=>'Registro No Encontrado'],400);

        }
        return response()->json($categoria::find($id),200);
    }
    public function insertCategoria(Request $request){
        $categoria=categoria::create($request->all());
        return response($categoria,200);

    }
    public function updateCategoria(Request $request,$id){
        $categoria=categoria::find($id);
        if(is_null($categoria)){
            return response()->json(['Mensaje'=>'Registro No Encontrado'],400);
        }
        $categoria->update($request->all());
        return response($categoria,200);
    }
    public function deleteCategoria($id){
        $categoria=categoria::find($id);
        if(is_null($categoria)){
            return response()->json(['Mensaje'=>'Registro No Encontrado'],400);
        }
        $categoria->delete();
        return response()->json(['Mensaje'=>'Registro Eliminado'],200);
    }
}
