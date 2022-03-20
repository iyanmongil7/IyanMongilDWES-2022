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
            <h1 class="col-12 display-5 text-primary text-danger text-center mt-2 pb-5"> LISTADO DE LIBROS</h1>
            <div class="row mt-4">

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-primary text-center">Harry Potter</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-danger text-center">Harry Potter 2</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-danger text-center">Harry Potter 3</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 mb-4 text-center">
                    <h2 class="text-danger text-center">El señor de los anillos</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>

                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-danger text-center">El señor de los anillos 2</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 text-center">
                    <h2 class="text-danger text-center">El señor de los anillos 3</h2>
                    <img class="img-fluid" src="{{asset('harry.jpg')}}">
                </div>
                
            </div>
        </div>
    </div>
</main>
@endsection