
@extends ('adminlte::page')

@section("content")

<form enctype="multipart/form-data" class="w-full max-w-lg border-4" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
     <h1 class="font-semibold py-5 text-blue mb-10 bg-blue-900 text-primary px-5">{{ $title }} </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3 " for="nombre">
                {{ __("Nombre:") }}
            </label>
            <input name="nombre"  placeholder="introduzca nombre" size="30" value="{{ $libro->nombre }}" class="form-control appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nombre" type="text">
 
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold " for="autor">
                {{ __("Autor:") }}
            </label>
            <input value="{{ $libro->autor }}" size="30" name="autor" placeholder="introduzca autor" class="form-control no-resize appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="autor"></input>
            
            @error("autor")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="editorial">
                {{ __("Editorial:") }}
            </label>
            <input value="{{ $libro->editorial }}" size="30" name="editorial" placeholder="introduzca editorial" class="form-control no-resize appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="editorial"></input>

            @error("description")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="año">
                {{ __("Año:") }}
            </label>
            <input value="{{ $libro->año }}" name="año" size="30"  placeholder="introduzca año" class="form-control no-resize appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="año"></input>

            @error("description")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="imagen">
                {{ __("Imagen:") }}
            </label>
            <input value="{{ $libro->imagen }}" type="file" size="30" name="imagen"  class="no-resize appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="imagen"></input>

            @error("description")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
   
    <div class="md:flex md:items-center">
        <div class="md:w-1/3 col-6">
            <button class="text-center shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-primary font-bold py-2 px-4 rounded" type="submit">
                {{ $textButton }}
            </button>
        </div>
    </div>
</form>
@endsection
