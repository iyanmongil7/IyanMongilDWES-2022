@extends('layouts.app')

@section("content")

    <h1 class="text-center text-success">{{ __("Listado de libros") }}</h1>
<table class="table table-danger table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Autor") }}</th>
        <th scope="col">{{ ("Editorial") }}</th>
        <th scope="col">{{ ("Año") }}</th>
        <th scope="col">{{ ("Imagen") }}</th>
    </tr>
    </thead>
    <tbody>
        @forelse($libros as $libro)
            <tr>
    
                <td>{{ $libro->nombre }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->editorial}}</td>
                <td>{{ $libro->año }}</td>
                <td>{{ $libro->imagen }}</td>

            
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay usuarios") }}</strong></p>
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
