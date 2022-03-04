<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    //
    public function generar(){
        $generos=Genero::where('estado','1')->orderBy('genero')->get();
        $response=[];


        if($generos->count()>0){
            $response=[
                "status"=>true,
                "message"=>'listado de generos',
                "data"=>$generos
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
