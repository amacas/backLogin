<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    //
    public function listar(){
        $provincias=Provincia::where('estado','1')->orderBy('provincia')->get();
        $response=[];


        if($provincias->count()>0){
            $response=[
                "status"=>true,
                "message"=>'listado de provincias',
                "data"=>$provincias
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
