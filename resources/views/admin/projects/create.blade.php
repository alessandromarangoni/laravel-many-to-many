@extends('layouts.admin')

@section('content')


<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <h1>Crea un nuovo post</h1>

        <div class="col-6">

            @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <form action="{{ route("admin.portfolio.store") }}" method="POST" class="needs-validation" enctype="multipart/form-data">
                @csrf
    
                <label for="title">Titolo</label>
                <input type="text" name="title" id="title" value="" class="form-control mb-4">
    
                <label for="content">Contenuto</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control mb-4">{{ old("content") }}</textarea>
    
                <label for="image">inserisci Immagine</label>
                <input type="file" name="image" id="image" value="" class="form-control mb-4">

                <label for="type_id">Categoria</label>
                <select class="form-control mb-4" name="type_id" id="type_id">
                    <option value="" selected disabled>tipo</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
                
                @foreach ($tecnologies as $index => $tecnology)
                    <div class="form-check">
                        <label for="tecnologies{{$index}}" class="form-check-label">
                            <input type="checkbox" value="{{$tecnology->id}}" name="tecnologies[]" id="tecnologies{{$index}}" class="form-check-input">
                            {{$tecnology->name}}
                        </label>
                    </div>
                @endforeach
                <input type="submit" class="btn btn-dark form-control mb-4" value="Crea post">
    
            </form>
        </div>
    </div>
</div>

@endsection