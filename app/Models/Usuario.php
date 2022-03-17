<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = false;
//sirve para no mostrar este campo
    protected $hidden = [
        'clave',
    ];

    //Array para guardar los datos
    protected $filleable =[
        'usuario',
        'nombre',
        'correo',
        'apellido',
        'telefono',
        'zipCodigo',
        'ciudad',
        'direccion',
        'estado',
        'provincia_id',
        'genero_id',
        'rol_id',
        'clave'
    ];

    //Uno a muchos
    public function cancion(){
        return $this->hasMany(Cancion::class);
    }
}
