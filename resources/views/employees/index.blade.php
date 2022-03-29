@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de empleados</h1>
        <button class="btn btn-primary">Crear</button>
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
                    
                @endforeach
                <tr>
                    <td>Tiger Nixon</td>                    
                </tr>
        </table>

    </div>

    <script>
        $(document).ready(function() {
            $('#empleados').DataTable();
        });
    </script>
@endsection
