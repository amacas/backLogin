<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class GeneralController extends Controller
{

    public function roles(){
        $roles=Rol::where('estado','1')->orderBy('detalle')->get();
        $response=[];

        if($roles->count()>0){
            $response=[
                "status"=>true,
                "message"=>'listado de roles',
                "data"=>$roles
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
