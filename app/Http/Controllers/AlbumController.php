<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Parser\Block\ListItemParser;

class AlbumController extends Controller
{
    public function albums()
    {
        $albums=Album::all();
        // trae todas los albums de la tabla albums
        return response()->json($albums);// devuelve un json con los albums
    }

    public function ListarAlbum()
    {
        $albums=Album::where('estado','1')->orderBy('album')->get();
        $response=[];

        if($albums->count()>0){
            $response=[
                "status"=>true,
                "message"=>'listado de albums',
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

    public function RegisterAlbum(Request  $data){

        $response = [];

        try {
            //Verificar si vienen los datos
            if($data && $data != null){
                $albumdata =$data;

                //Parseamos las relaciones y convertimos de string en int
                $albumdata->usuario_id = intval($albumdata->usuario_id);

                 //Buscar si el artista ya tiene registrado el nombre del album
                 $exist_album = Album::where('name_album', $albumdata->name_album)
                 ->where('usuario_id', $albumdata->usuario_id)->first();

                //Validacion del nombre del album
            if($exist_album){
                    $response = [
                        'status' => false,
                        'message' => 'El nombre del album ya se encuentra registrado',
                        'data' => false
                    ];
                }
                else{
                    //Guardar los datos
                    $albumNew = new Album();
                    $albumNew->usuario_id = $albumdata->usuario_id;
                    $albumNew->name_album = trim(ucfirst($albumdata->name_album));
                    $albumNew->estado = 1;

                    $albumNew->save();

                    $response = [
                        'status' => true,
                        'message' => 'Se ha registrado su album correctamente',
                        'data' => $albumNew
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

    

}
