<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = false;

    protected $hidden = [
        'clave',
        'usuario',
        'nombre',
        'correo',
        'apellido',
        'gender',
        'telefono',
        'zipCodigo',
        'ciudad',
        'direccion',
        'estado',
        'provincia_id',
        'genero_id'



    ];


}
