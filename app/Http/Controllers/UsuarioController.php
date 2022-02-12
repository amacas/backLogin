<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    //
    public function login(Request $request)
    {
        //crequest viene de la solicitud http
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

}
