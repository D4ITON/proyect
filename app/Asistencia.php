<?php

namespace App;
use App\Clase;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    
	protected $fillable = [
        'user_id','clase_id','asistio',
    ];

    public function clase()
    {
    	return $this->belongsTo(Clase::class);
    }
}
