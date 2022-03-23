@extends ('adminlte::page')

@section("content")

    <h1 class="text-center text-dark">{{ __("Listado de libros") }}</h1> 
    <div class="text-center pt-2 pb-2">
    <a href="{{route('libros.create')}}" class="btn btn-primary">Añadir</a>
    </div>
<table class="table table-success table-striped" style="width: 100%">
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

                <td><a href="{{route('libros.edit',  $libro->id )}}" class="btn btn-primary btn-sm">Editar</a></td>
                <td>
                <form id="delete-libro-{{$libro->id }}-form" action="{{route('libros.destroy', $libro->id)}}" method="POST" class="hidden">
                    @method('DELETE')
                    @csrf
                </form>

                <button class="btn btn-danger btn-sm" onclick="event.preventDefault() ; 
                 document.getElementById('delete-libro-{{$libro->id }}-form').submit();">Eliminar</button>
                </td>
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
