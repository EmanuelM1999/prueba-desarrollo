<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //Propiedad que permite definir a que tabla corresponde el modelo.
    protected $table = "roles";

    //relacion muchos a muchos
    public function roles(){
        return $this->belongsToMany(Empleado::class, $relatedPivotKey= 'roles_id');
    }
}
