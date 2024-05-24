@extends('layouts.app')
@section('content')
    <h1 class="text-center my-3">Comics List</h1>
    <div class="container">
        <div class="row row-cols-4">
            @foreach ($comics as $comic)
            <div class="col">
                <div class="card my-4">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <span class="fw-bold card-text">{{ $comic->title }}</span>
                        <p class="card-text">{{ $comic->description }}</p>
                        <p class="card-text">Price: {{ $comic->price }} £</p>
                        <p class="card-text">Series: {{ $comic->series }}</p>
                        <p class="card-text">{{ $comic->sale_date }}</p>
                        <small class="card-text">Comic type: {{ $comic->type }}</small>
                        <div class="card-text my-4">
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}">
                                <button class="btn btn-primary">More info</button>
                            </a>
                        </div>
                        <div class="card-text">
                            <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}">
                                <button class="btn btn-primary">Edit info</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
