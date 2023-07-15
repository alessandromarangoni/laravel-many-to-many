@extends('layouts.admin')

@section('content')


<div class="container-fluid mt-4">
    <div class="row justify-content-center text-center">
        <h1 class="">Modifica il tuo progetto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-6">
            <form action="{{ route("admin.portfolio.update",$portfolio) }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <label for="title">Titolo</label>
                    <input type="text" name="title" id="title" value="{{ old('title') ?? $portfolio->title}}" class="form-control mb-4">
                <label for="content">Contenuto</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control mb-4" value="{{ old('content') ?? $portfolio->content}}">{{ old('content') ?? $portfolio->content}}</textarea>
                    <label for="image">inserisci Immagine</label>
                <input type="file" name="image" id="image" value="" class="form-control mb-4">
                
                <label for="type">
                    Tipologia:
                    <select class="form-control mb-4" name="type_id" id="type_id">
                        <option selected value="{{$portfolio->type->id}}">{{$portfolio->type->name}}</option>
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </label>

                <div  class="d-flex">
                    @foreach ($tecnologies as $index => $tecnology)
                    <div class="form-check m-1">
                        <label for="tecnologies{{$index}}" class="form-check-label">
                            <input type="checkbox" value="{{ old('id') ?? $tecnology->id}}"
                            name="tecnologies[]" id="tecnologies{{$index}}"
                            class="form-check-input"
                            @checked(in_array($tecnology->id, old('tecnologies') ?? $portfolio->tecnologies->pluck('id')->toArray()))>
                            {{$tecnology->name}}
                        </label>
                    </div>
                    @endforeach
                </div>
                <input type="submit" class="btn btn-dark form-control m-4" value="Crea post">
        </div>
    </div>
</div>

@endsection