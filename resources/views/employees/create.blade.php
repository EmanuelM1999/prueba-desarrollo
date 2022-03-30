@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear empleado</h1>
        <div class="alert alert-primary" role="alert">
            Los campos con asteriscos (*) son obligatorios
        </div>

        <form id="form" action="">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nombre completo * </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email * </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Sexo * </label>
                <div class="col-sm-10">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="masculino">
                        <label class="custom-control-label">Masculino</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="femenino">
                        <label class="custom-control-label">Femenino</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Area * </label>
                <div class="col-sm-10">
                    <select class="custom-select" id="area">
                        @foreach ($areas as $area)
                            <option id="{{ 'area' . $area->id }}" value="{{ $area->id }}">{{ $area->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Descripcion * </label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="descripcion"></textarea>
                </div>
            </div>

            <div class="form-group row ">
                <div class="col-sm-10">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="boletin">
                        <label class="custom-control-label">Deseo recibir boletin informativo</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Roles * </label>
                <div class="col-sm-10">
                    @foreach ($roles as $rol)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="{{ 'rol' . $rol->id }}"
                                value="{{ 'rol' . $rol->id }}">
                            <label class="custom-control-label" for="customCheckDisabled">{{ $rol->nombre }}</label>
                        </div>
                    @endforeach


                </div>
            </div>

            <button type="submit" id="" class="btn btn-primary">Guardar</button>

        </form>
    </div>

    <script>
        $(document).ready(function() {

            $("#form").submit(function(event) {
                event.preventDefault();

                let rolesTotales = [],
                    boolBoletin, sexoSelecionado;

                for (let index = 1; index < {{ $roles->count() }}; index++) {

                    if ($("#rol" + index).is(':checked')) {
                        rolesTotales.push(index);
                    }

                }

                if ($("#boletin").is(':checked')) {
                    boolBoletin = true;
                } else {
                    boolBoletin = false;
                }

                if ($("#masculino").is(':checked')) {
                   sexoSelecionado = 'M';
                } else if ($("#femenino").is(':checked')) {
                    sexoSelecionado = 'F';
                }

                let empleado = {
                    nombre: $('#nombre').val(),
                    email: $('#email').val(),
                    sexo: sexoSelecionado,
                    boletin: boolBoletin,
                    roles: rolesTotales,
                    area: $('#area').val(),
                    descripcion: $('#descripcion').val()
                }

                $.ajax({
                    url: '{{ route('employees.store') }}',
                    data: {
                        empleado
                    },
                    type: 'POST',
                    dataType: 'json',
                    success: function(json) {
                        swal(" ¡Usuario creado! ", " Usuario creado correctamente ", "success");
                    },
                    error: function(json, xhr, status) {
                        swal(" ¡Usuario no creado! ",
                            "Complete toda la informacion y valide los datos", "error");
                    },
                });

            });
        });
    </script>
@endsection
