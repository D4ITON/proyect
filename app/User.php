<?php


namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($password)
    {
         $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }



    // DEFINIMOS LA RELACION HASONE HAS MANY
    public function roles()
    {
        return $this->belongsToMany(Role::class,'assigned_roles');
    }

    //funcion para muchos a muchos matriculas

    public function cursos()
    {
        return $this->belongsToMany(Curso::class,'matriculas');
    }

    //RELACION USUARIO TIENE MUCHAS CLASES
    public function clases()
    {
        //LA TABLA RELACIONADA ES ASISTENCIAS
        return $this->belongsToMany(Clase::class,'asistencias');
    }



    public function hasRoles(array $roles)
    {

        return $this->roles->pluck('name')->intersect($roles)->count();
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }


    public function isDelegado()
    {
        //retorna verdadero si es delegado y administrador
        return $this->hasRoles(['delegado','admin']);
    }


}


 // public function hasRoles(array $roles)
 //    {

 //        foreach ($roles as $role)
 //        {
 //            foreach ($this->roles as $userRole) 
 //            {
 //                if ($userRole->name === $role) 
 //                {
 //                    return true;            
 //                }
 //            }
 //        }

 //        return false;
 //    }