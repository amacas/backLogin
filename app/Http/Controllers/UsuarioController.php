<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Exists;

class UsuarioController extends Controller
{
    //
    public function login(Request $request)
    {
        //request viene de la solicitud http
       $correo=$request->correo;
       $clave=$request->clave;


         //buscar el usuario en la base de datos
         $usuario=Usuario::where('correo',$correo)->first();
         //first devuelve el primer registro de la consulta
         //where devuelve una coleccion
         //Usuario es el modelo
         if($usuario){
            if (Hash::check($clave, $usuario->clave)) {
                $response=['status'=> true,'messsage'=> 'acceso permitido','data'=>$usuario];
            }else{
                $response=['status'=> false,'messsage'=> 'contraseña incorrecta'];
            }
         }else{
             $response=['status'=> false,'messsage'=> 'el usuario no existe'];
         }

        return response()->json($response);
    }

    public function usuarios()
    {
        $usuarios=Usuario::all();
        // trae todos los usuarios de la tabla usuarios
        return response()->json($usuarios);// devuelve un json con los usuarios
    }

    //validar correo y usuario que no se repita
    //

    public function register(Request  $data){

        $exis_correo=Usuario::where('correo', $data->correo)->first();
        $exis_usuario=Usuario::where('usuario', $data->usuario)->first();
        $response=[];

        if($exis_correo){
            $response=[
                "status"=>false,
                "message"=>'el correo ya se encuentra registrado',
                "data"=>false
            ];
        }else
        if($exis_usuario){
            $response=[
                "status"=>false,
                "message"=>'el usuario ya se encuentra registrado',
                "data"=>false
            ];
        }
        else{
            $person = new User();

            $person->nombre = ucfirst($data->name);
            $person->apellido = ucfirst($data->apellido);
            $person->telefono = $data->telefono;
            $person->clave =  Hash::make($data->clave);
            $person->zipCodigo = $data->zipCode;
            $person->correo = $data->correo;
            $person->ciudad = $data->ciudad;
            $person->direccion = $data->direccion;
            $person->usuario = $data->usuario;
            $person->provincia_id = $data->provincia_id;
            $person->genero_id = $data->genero_id;
            $person->estado = 1;
            $person->save( );

            $response=[
                "status"=>true,
                "message"=>'se ha creado el registro correctamente',
                "data"=>$person
            ];
        }

        return response()->json($response);
    }
}


