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



    public function createMusic(Request  $data){

        $exis_cancion=Cancion::where('musica', $data->name_song)->where('usuario', $data->usuario)->first();
        //$exis_usuario=Cancion::where('usuario', $data->usuario)->first();
        $response=[];

        if($exis_cancion){
            $response=[
                "status"=>false,
                "message"=>'la cancion ya se encuentra registrado',
                "data"=>false
            ];
        }
        //else if($exis_usuario){
        //     $response=[
        //         "status"=>false,
        //         "message"=>'el usuario ya se encuentra registrado',
        //         "data"=>false
        //     ];
        // }
        else{
            $cancion = new Cancion();


            $cancion->nombre = ucfirst($data->name_song);
            $cancion->time = $data->time;
            $cancion->sizeFile = $data->sizeFile;

            $cancion->usuario_id = intval($data->usuario_id);
            $cancion->generSong_id = intval($data->generSong_id);
            $cancion->year_id= intval($data->year_id);
            $cancion->album_id= intval($data->album_id);
            $cancion->estado = 1;
            $cancion->save( );

            $response=[
                "status"=>true,
                "message"=>'se ha creado el registro correctamente',
                "data"=>$cancion
            ];
        }

        return response()->json($response);
    }

    public function delete($id){
        $res = Cancion::find($id)->delete();
        return response()->json([
            "status"=>true,
            "message"=>'se ha eliminado el registro correctamente',
            "data"=>true
        ]);
    }




}
