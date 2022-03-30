@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/">Volver</a>
    <h1>Modificar empleado</h1>
    <div class="alert alert-primary" role="alert">
        Los campos con asteriscos (*) son obligatorios
    </div>

    <form id="form" action="">
        <div class="form-group row my-4">
            <label class="fw-bold col-sm-2 col-form-label">Nombre completo * </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre">
            </div> 
        </div>
        <div class="form-group row my-4">
            <label class="fw-bold col-sm-2 col-form-label">Email * </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email">
            </div>
        </div>

        <div class="form-group row my-4">
            <label class="fw-bold col-sm-2 col-form-label">Sexo * </label>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="masculino">
                    <label class="form-check-label" for="masculino">
                      Masculino
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="femenino" >
                    <label class="form-check-label" for="femenino">
                      Femenino
                    </label>
                  </div>
            </div>
        </div>

        <div class="form-group row my-4">
            <label class=" fw-bold col-sm-2 col-form-label">Area * </label>
            <div class="col-sm-10">
                <select class="form-select" id="area">
                    @foreach ($areas as $area)
                        <option id="{{ 'area' . $area->id }}" value="{{ $area->id }}">{{ $area->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row my-4">
            <label class="fw-bold col-sm-2 col-form-label">Descripcion * </label>
            <div class="col-sm-10">
                <textarea class="form-control" id="descripcion"></textarea>
                <div class="custom-control custom-checkbox my-4" >
                    <input type="checkbox" class="custom-control-input" id="boletin">
                    <label class="custom-control-label">Deseo recibir boletin informativo</label>
                </div>
            </div>
        </div>

        <div class="form-group row my-4">
            <label class="fw-bold col-sm-2 col-form-label">Roles * </label>
            <div class="col-sm-10">
                @foreach ($roles as $rol)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{ 'rol' . $rol->id }}"
                            value="{{ 'rol' . $rol->id }}">
                        <label class="custom-control-label" for="customCheckDisabled">{{ $rol->nombre }}</label>
                    </div>
                @endforeach
                <button type="submit" id="" class="btn btn-warning my-4">Modificar</button>
            </div>
        </div>
    </form>
</div>



@endsection