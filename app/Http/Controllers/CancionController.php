<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use Illuminate\Http\Request;

class CancionController extends Controller
{

    public function listar(){
        $canciones=Cancion::where('estado','1')->orderBy('cancion')->get();
        $response=[];

        if($canciones->count()>0){
            $response=[
                "status"=>true,
                "message"=>'listado de canciones',
                "data"=>$canciones
            ];
        }else{
            $response=[
                "status"=>false,
                "message"=>'no existe data',
                "data"=>false
            ];
        }
        return response()->json($response);
    }

}
