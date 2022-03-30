@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de empleados</h1>

        <div class="d-flex justify-content-end">
            <button id="btn-crear" class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> Crear</button>
        </div>

        <div class="my-2">
            <table id="empleados" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th><i class="fa-solid fa-user"></i> Nombre</th>
                        <th><i class="fa-solid fa-at"></i> Email</th>
                        <th><i class="fa-solid fa-venus-mars"></i> Sexo</th>
                        <th><i class="fa-solid fa-briefcase"></i> Area</th>
                        <th><i class="fa-solid fa-envelope"></i> Boletin</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empleados as $empleado)
                        <tr>
                            <td>{{ $empleado->nombre }}</td>
                            <td>{{ $empleado->email }}</td>
                            <td>{{ $empleado->sexo }}</td>
                            <td>{{ $empleado->area->nombre }}</td>
                            <td>{{ $empleado->boletin ? 'Si' : 'No' }}</td>
                            <td><a style="color: black" href="{{ route('employees.edit', $empleado->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a style="color: black" id="btn-eliminar" href="{{route('employees.show', $empleado->id)}}"><i class="fa-solid fa-trash-can"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>


    </div>

    <script>
        $(document).ready(function() {
            $('#empleados').DataTable();
            
            $("#btn-crear").click(function() {
                window.location.href = "{{ route('employees.create') }}"
            })
        });
    </script>
@endsection
