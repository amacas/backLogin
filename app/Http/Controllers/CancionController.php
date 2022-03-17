<?php

namespace App\Http\Controllers;

use App\Models\Cancion;
use Illuminate\Http\Request;
use Mockery\Undefined;

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
    public function canciones()
    {
        $canciones=Cancion::all();
        // trae todos los usuarios de la tabla usuarios
        return response()->json($canciones);// devuelve un json con los usuarios
    }


    public function registerSong(Request  $data){

        $response = [];

        try {
            //Verificar si vienen los datos
            if($data && $data != null){
                $canciondata = $data;

                //Parseamos las relaciones y convertimos de string en int
                $canciondata->usuario_id = intval($canciondata->usuario_id);
                $canciondata->generSong_id = intval($canciondata->generSong_id);
                $canciondata->album_id = intval($canciondata->album_id);
                $canciondata->year_id = intval($canciondata->year_id);
                $canciondata->sizeFile = intval($canciondata->sizeFile);


                //Buscar si el artista ya tiene registrado el nombre de la canción
                $exist_cancion = Cancion::where('name_song', $canciondata->name_song)
                    ->where('usuario_id', $canciondata->usuario_id)->first();

                //Validacion del nombre de la canción
                if($exist_cancion){
                    $response = [
                        'status' => false,
                        'message' => 'El nombre de la música ya se encuentra registrado',
                        'data' => false
                    ];
                }
                else{
                    //Guardar los datos
                    $cancionNew = new Cancion();
                    $cancionNew->usuario_id = $canciondata->usuario_id;
                    $cancionNew->generSong_id = $canciondata->generSong_id;
                    $cancionNew->album_id = $canciondata->album_id;
                    $cancionNew->year_id = $canciondata->year_id;
                    $cancionNew->time =  $canciondata->time;
                    $cancionNew->name_song = trim(ucfirst($canciondata->name_song));
                    $cancionNew->sizeFile = $canciondata->sizeFile;
                    $cancionNew->estado = 1;

                    $cancionNew->save();

                    $response = [
                        'status' => true,
                        'message' => 'Se ha registrado su canción :v',
                        'data' => $cancionNew
                    ];
                }
            }else{
                $response = [
                    'status' => false,
                    'message' => 'No se ha enviado los datos',
                    'data' => false
                ];
            }
        } catch (\Throwable $th) {
            //Si ocurrio un error fuera de lo normal
            $response = [
                'status' => false,
                'message' => 'Ocurrio un error, intente nuevamente !',
                'data' => false
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

    public function listarMusica($usuario_id, $estado){

        $response = [];

        // try {
            if($usuario_id){
                $estado = intval($estado);

                // estado 1 = Activa, estado 2 = Inactiva, estado 3 = Eliminadas
                if($estado > 0 && $estado < 4){
                    $canciones = Cancion::where('usuario_id', $usuario_id)->where('estado', $estado)->get();

                    if($canciones->count() > 0){
                        foreach($canciones as $c){
                            $c->usuario;
                            $c->generSong;
                            $c->year;
                            $c->album;
                        }
                    }

                    $response = [
                        'status' => true,
                        'message' => 'Datos existentes',
                        'data' => $canciones
                    ];
                }else{
                    $response = [
                        'status' => false,
                        'message' => 'El estado es incorrecto',
                        'data' => false
                    ];
                }

            }else{
                $response = [
                    'status' => false,
                    'message' => 'No ha enviado el parámetro',
                    'data' => false
                ];
            }
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     $response = [
        //         'status' => false,
        //         'message' => 'Ha ocurrido un error, intente nuevamente',
        //         'data' => false
        //     ];
        // }

        return response()->json($response);
    }
}
