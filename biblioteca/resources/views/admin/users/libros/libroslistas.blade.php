@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
        <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="container">
            <h1 class="col-12 display-5 text-primary text-danger text-center mt-2 pb-5"> Catálogo</h1>
            
            @forelse($libros as $libro)
            <div class="container">
                <div class="row mt-4">
                    <div class="col-xs-6 col-sm-4 col-md-3 text-center border ">
                        <h2 class="px-4 py-2 text center">{{ $libro->nombre }}</h2>
                        <img class="img-fluid" src="{{$libro->imagen}}">
                    </div>
                </div>
            </div>

            @empty
                <tr>
                    <td colspan="4">
                        <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                            <p><strong class="font-bold">{{ ("No hay Juegos") }}</strong></p>
                            <span class="block sm:inline">{{ ("Todavía no hay nada que mostrar aquí") }}</span>
                        </div>
                    </td>
                </tr>
            @endforelse
            <!--<div class="row mt-4">

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-primary text-center">Harry Potter</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-primary text-center">Harry Potter</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-primary text-center">Harry Potter</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-primary text-center">Harry Potter</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-primary text-center">Harry Potter</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-primary text-center">Harry Potter</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-primary text-center">Harry Potter</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-primary text-center">Harry Potter</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>
                
            </div>-->
        </div>
    </div>
</main>
@endsection