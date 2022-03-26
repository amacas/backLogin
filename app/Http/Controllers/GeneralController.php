<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Rol;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Models\GenerSong;

class GeneralController extends Controller
{
    //roles de los ususarios ingresados
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

    //años de qeu se creo una cancion
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

    //genero de la cancion que se esta creando
    public function geners_songs(){
        $geners_songs=GenerSong::where('estado','1')->orderBy('generSong')->get();
        $response=[];

        if($geners_songs->count()>0){
            $response=[
                "status"=>true,
                "message"=>'listado de Genero de Canciones',
                "data"=>$geners_songs
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
    //nombres del albun que se creo
    public function  albums_songs(){
        $albums=Album::where('estado','1')->orderBy('name_album')->get();
        $response=[];

        if($albums->count()>0){
            $response=[
                "status"=>true,
                "message"=>'listado de albums de Canciones',
                "data"=>$albums
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
