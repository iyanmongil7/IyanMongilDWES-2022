@extends('admin.index')

@section("content")

    <h1 class="text-center text-dark">{{ __("Listado de usuarios") }}</h1>

<table class="table table-success table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Email") }}</th>
        <th scope="col">{{ ("Rol") }}</th>
        <th scope="col">{{ ("Permisos") }}</th>
    </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>

                <td>{{ $user->id }}</td>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>
                    {{implode(' , ',$user->roles->map(function($role){
                            return $role->name;
                            })->toArray()
                        )
                        }}
                </td>
                <td>{{ date_format($user->created_at, "d/m/Y") }}</td>
                <td class="border px-4 py-2">
             
                <a href="#" class="text-red-400" onclick="event.preventDefault();
                                document.getElementById('delete-user-{{ $user->id }}-form').submit();"><button class="btn btn-danger btn-sm">{{ __("Eliminar") }}</button>
                </a>
                <form id="delete-user-{{ $user->id }}-form" action="{{ route('users.destroy', $user->id) }}" method="POST" class="hidden">
                    @method("DELETE")
                    @csrf
                </form>
              
                </td>
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
