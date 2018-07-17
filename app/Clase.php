<?php

namespace App;

use App\Curso;
use App\Asistencia;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'tema','curso_id','tomo_asistencia',
    ];

    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    public function curso()
    {
    	return $this->belongsTo(Curso::class);
    }


    public function asistencias()
    {
    	return $this->hasMany(Asistencia::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }


}
