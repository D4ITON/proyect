<?php

namespace App;


use App\Clase;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nombre','docente',
    ];

    // Relacion de cursos y alumnos
    public function user()
    {
    	return $this->hasMany(User::class);
    }


    public function clase()
    {
    	return $this->hasMany(Clase::class);
    }



    //retorna las calses que tiene
    public function hasClases(array $curso)
    {
    	return $this->clase->pluck('id')->intersect($curso)->count();
    }


}
