@extends('admin.index')

@section("content")

    <h1 class="text-center text-dark">{{ __("Listado de libros") }}</h1>
    <a href="" class="btn btn-primary btn-sm">Añadir</a>
<table class="table table-success table-striped" style="width: 100%">
    <thead>
    <tr>
        

        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Autor") }}</th>
        <th scope="col">{{ ("Editorial") }}</th>
        <th scope="col">{{ ("Año") }}</th>
    </tr>
    </thead>
    <tbody>
        @forelse($libros as $libro)
            <tr>
    
                <td>{{ $libro->nombre }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->editorial}}</td>
                <td>{{ $libro->año }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay libros") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">

</div>
@endsection