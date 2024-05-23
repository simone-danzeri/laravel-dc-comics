@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col">
            <div class="card my-4">
                <img src="{{ $comic->thumb }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <span class="fw-bold card-text">{{ $comic->title }}</span>
                    <p class="card-text">{{ $comic->description }}</p>
                    <p class="card-text">Price: {{ $comic->price }} £</p>
                    <p class="card-text">Series: {{ $comic->series }}</p>
                    <p class="card-text">{{ $comic->sale_date }}</p>
                    <small class="card-text">Comic type: {{ $comic->type }}</small>
                </div>
            </div>
        </div>
    </div>
@endsection
