@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($files as $file)
                <div class="col-4">
                    <div class="card">
                        <img src="{{asset($file->url)}}" alt="" class="img-fluid">

                        <div class="card-footer">
                            <a href="{{route('admin.files.edit', $file)}}" class="btn btn-primary">Editar</a>
                            <form action="{{route('admin.files.destroy', $file)}}" class="d-inline formulario-eliminar" method="POST">

                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-12">
                {{$files->links()}}
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
            '¡Eliminado!',
            'La imagen se elimino con éxito.',
            'success'
            )
        </script>
    @endif

    <script>

        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();


            Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta imagen se eliminara definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Si, eliminar!',
            cancelButtonText: 'Cancelar',
            }).then((result) => {
            if (result.value) {
                /* Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                ) */

                this.submit();
            }
            })

        });


       /*  Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        }) */
    </script>
@endsection