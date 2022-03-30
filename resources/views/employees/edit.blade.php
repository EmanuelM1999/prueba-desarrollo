@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/"><i class=" my-4 fa-solid fa-arrow-left-long"> Volver</i></a>
        <h1>Modificar empleado</h1>
        <div class="alert alert-primary" role="alert">
            Los campos con asteriscos (*) son obligatorios
        </div>

        <form id="form" action="">
            <div class="form-group row my-4">
                <label class="fw-bold col-sm-2 col-form-label">Nombre completo * </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" value="{{ $empleado->nombre }}">
                </div>
            </div>
            <div class="form-group row my-4">
                <label class="fw-bold col-sm-2 col-form-label">Email * </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="{{ $empleado->email }}">
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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="femenino">
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
                    <textarea class="form-control" id="descripcion">{{ $empleado->descripcion }}</textarea>
                    <div class="custom-control custom-checkbox my-4">
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

    <script>
        $(document).ready(function() {
            //Activa los checkbox dependiendo de la informacion del usuario
            if ('{{ $empleado->sexo }}' == "M") {
                $('#masculino').attr('checked', true);
            } else {
                $('#femenino').attr('checked', true);
            }

            $('#area' + {{ $empleado->area_id }}).attr('selected', true);

            if ('{{ $empleado->boletin }}' == 1) {
                $('#boletin').attr('checked', true);
            }

            let roles = JSON.parse('{{ $empleado->roles }}'.replace(/&quot;/g, '"'));

            for (let index = 0; index < roles.length; index++) {
                $("#rol" + roles[index].id).attr('checked', true);
            }

            //Se activa al momento de dar guardar
            $("#form").submit(function(event) {
                event.preventDefault();

                let rolesTotales = [],
                    boolBoletin, sexoSelecionado;

                for (let index = 1; index <= {{ $roles->count() }}; index++) {

                    if ($("#rol" + index).is(':checked')) {
                        rolesTotales.push(index);
                    }

                }

                if ($("#boletin").is(':checked')) {
                    boolBoletin = 1;
                } else {
                    boolBoletin = 0;
                }

                if ($("#masculino").is(':checked')) {
                    sexoSelecionado = 'M';
                } else if ($("#femenino").is(':checked')) {
                    sexoSelecionado = 'F';
                }

                $.ajax({
                    url: '{{ route('employees.update', $empleado->id) }}',
                    data: {
                        nombre: $('#nombre').val(),
                        email: $('#email').val(),
                        sexo: sexoSelecionado,
                        boletin: boolBoletin,
                        roles: rolesTotales,
                        area_id: $('#area').val(),
                        descripcion: $('#descripcion').val()
                    },
                    type: 'PUT',
                    dataType: 'json',
                    success: function(json) {
                        swal(" ¡Usuario actualizado! ", " Usuario Actualizado correctamente ", "success");
                    },
                    error: function(json, xhr, status) {
                        swal(" ¡Usuario no actualizado! ",
                            "Complete toda la informacion y valide los datos", "error");
                    },
                });

            });

        });
    </script>
@endsection
