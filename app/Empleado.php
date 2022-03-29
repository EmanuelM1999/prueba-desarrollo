<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //Relacion muchos a muchos
    public function roles(){
        return $this->belongsToMany(Rol::class);
    }

    //relacion uno a muchos
    public function area(){
        return $this->belongsTo(Area::class);
    }
}
