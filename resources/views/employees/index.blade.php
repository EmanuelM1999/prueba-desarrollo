@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de empleados</h1>
        <button id="btn-crear" class="btn btn-primary">Crear</button>
        <table id="empleados" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Sexo</th>
                    <th>Area</th>
                    <th>Boletin</th>
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
                        <td>{{ $empleado->boletin }}</td>
                        <td>Eliminar</td>
                        <td>Modificar</td>
                    </tr>
                @endforeach
            </tbody>

        </table>


    </div>

    <script>
        $(document).ready(function() {
            $('#empleados').DataTable();

            $("#btn-crear").click(function() {
                window.location.replace("{{route('employees.create')}}");
            });
        });
    </script>
@endsection
