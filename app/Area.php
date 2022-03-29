<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //Relacion uno a muchos inversa
    public function empleados(){
        return $this->hasMany(Empleado::class);
    }
}
