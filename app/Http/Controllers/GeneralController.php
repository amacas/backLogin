<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Year;
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


    public function years(){
        $years=Year::where('estado','1')->orderBy('year')->get();
        $response=[];

        if($years->count()>0){
            $response=[
                "status"=>true,
                "message"=>'listado de años',
                "data"=>$years
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
