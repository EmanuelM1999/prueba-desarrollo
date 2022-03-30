@extends('layouts.app')

@section('content')
    <script>
        $(document).ready(function() {
            swal({
                    title: "Estas seguro?",
                    text: "Una vez eliminado, no se podra recuperar este registro",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: '{{ route('employees.destroy', $id) }}',
                            data: {

                            },
                            type: 'DELETE',
                            dataType: 'json',
                            success: function(json) {
                                swal("El registro ha sido eliminado", {
                                    icon: "success",
                                }).then(() => {
                                    window.location.href = "{{ route('index') }}"
                                });
                            },
                            error: function(json, xhr, status) {
                                swal(" ¡Registro no eliminado! ",
                                    "El registro no se pudo eliminar por un error inesperado.",
                                    "error").then(() => {
                                    window.location.href = "{{ route('index') }}"
                                });

                            },
                        });


                    }
                });


        });
    </script>
@endsection
