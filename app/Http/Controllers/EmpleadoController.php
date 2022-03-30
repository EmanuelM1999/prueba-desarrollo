<?php

namespace App\Http\Controllers;

use App\Area;
use App\Empleado;
use App\Http\Requests\StoreEmpleadoRequest;
use App\Http\Requests\UpdateEmpleadoRequest;
use App\Rol;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $empleados = Empleado::all();

        return view('employees.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();

        $roles = Rol::all();


        return view('employees.create', compact('areas','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpleadoRequest $request)
    {
        $empleado = Empleado::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'descripcion' => $request->descripcion,
            'area_id' => $request->area_id,
            'boletin' => $request->boletin
        ]);

        $empleado->roles()->attach($request->roles);

        return $request->roles;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::with(['roles','area'])->findOrFail($id);

        $areas = Area::all();

        $roles = Rol::all();

        return view('employees.edit', compact(['empleado', 'roles', 'areas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpleadoRequest $request,  $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'sexo' => $request->sexo,
            'descripcion' => $request->descripcion,
            'area_id' => $request->area_id,
            'boletin' => $request->boletin
        ]);

        $empleado->roles()->sync($request->roles);
        
        return $empleado;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado = Empleado::findOrFail($empleado->id);

        $empleado->delete();

        return $empleado;
    }
}
