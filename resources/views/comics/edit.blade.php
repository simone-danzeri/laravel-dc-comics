@extends('layouts.app')
@section('content')
    <h1 class="text-center my-3">Edit - <span class="fw-light fst-italic">{{$comic->title}}</span> - info</h1>
    <div class="container py-5">
        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">TITLE</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $comic->title }}">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">THUMB</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="{{ $comic->thumb }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">PRICE</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $comic->price }}">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">SERIES</label>
                <input type="text" class="form-control" id="series" name="series" value="{{ $comic->series }}">
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">SALE DATE</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date" value="{{ $comic->price }}">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">COMIC TYPE</label>
                <input type="text" class="form-control" id="type" name="type"  value="{{ $comic->type }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">DESCRIPTION</label>
                <textarea name="description" id="description" rows="5" cols="50" class="form-control">{{ $comic->description }}"</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
