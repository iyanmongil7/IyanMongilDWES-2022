@extends('admin.index')

@section("content")

<h1 class="text-center text-success">{{ __("Listado de Proyectos") }}</h1>

<table class="table table-danger table-striped" style="width: 100%">
        <thead>
        <tr>
            <th class="px-4 py-2">{{ __("Nombre del proyecto") }}</th>
            <th class="px-4 py-2">{{ __("Usuario") }}</th>
            <th class="px-4 py-2">{{ __("Alta") }}</th>
        </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
                    <tr>
                        <td class="border px-4 py-2">{{ $project->name }}</td>
                        <td class="border px-4 py-2">{{ $project->user->name }}</td>
                        <td class="border px-4 py-2">{{ date_format($project->created_at, "d/m/Y") }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                <p><strong class="font-bold">{{ __("No hay Usuarios") }}</strong></p>
                                <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                            </div>
                        </td>
                    </tr>
            @endforelse
        </tbody>
    </table>
@endsection