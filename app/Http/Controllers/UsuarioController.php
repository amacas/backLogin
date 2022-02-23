<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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


    public function register(Request  $data){
        $person = new User();

        $person->nombre = ucfirst($data->name);
        $person->apellido = ucfirst($data->apellido);
        $person->gender = $data->gender;
        $person->telefono = $data->telefono;
        $person->clave = $data->clave;
        $person->zipCodigo = $data->zipCode;
        $person->correo = $data->email;
        $person->ciudad = $data->ciudad;
        $person->direccion = $data->direccion;
        $person->usuario = $data->user;
        $person->estado = 1;
        $person->save( );

        return response()->json($person);;
    }
}
