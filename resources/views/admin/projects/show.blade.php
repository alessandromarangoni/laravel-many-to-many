@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
            <div class="card p-0 mb-4" style="width: 18rem;">
                <img class="card-img-top" src="{{ $portfolio->image }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $portfolio->title }}</h5>
                    <p class="card-text">{{ $portfolio->content }}</p>
                    <h5>Type: {{$portfolio->type->name}}</h5>
                    <h3>tecnologie utilizzate</h3>:
                    @foreach ($portfolio->tecnologies as $item)
                    <span>{{$item->name}},</span>
                    @endforeach
                </div>
            </div>
    </div>
</div>

@endsection