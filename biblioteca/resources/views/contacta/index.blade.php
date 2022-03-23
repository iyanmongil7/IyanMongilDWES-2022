@extends('layouts.app')

@section('content')
    @if(Auth::check())
    <div class="flex justify-center flex-wrap p-4 mt-5">
        @include("contacta.form")
    </div>

    @elseif(!Auth::check())
    
    <div class="text-center pt-5">
        <h1>Necesitas estar logueado</h1>
    </div>
    @endif
@endsection