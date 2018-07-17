<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
    	return $this->hasMany(User::class);
    }
}


//relacion has one y has many es decir de uno a uno y de uno a muchos