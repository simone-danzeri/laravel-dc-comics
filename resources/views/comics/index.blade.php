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
                        {{-- <p class="card-text">{{ $comic->description }}</p> --}}
                        <p class="card-text">Price: {{ $comic->price }} £</p>
                        <p class="card-text">Series: {{ $comic->series }}</p>
                        {{-- <p class="card-text">{{ $comic->sale_date }}</p> --}}
                        {{-- <small class="card-text">Comic type: {{ $comic->type }}</small> --}}
                        <div class="card-text my-2">
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}">
                                <button class="btn btn-primary">More info</button>
                            </a>
                        </div>
                        <div class="card-text my-2">
                            <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}">
                                <button class="btn btn-primary">Edit info</button>
                            </a>
                        </div>
                        <div class="card-text my-2">
                            <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger js-delete-btn" data-comic-title = "{{ $comic->title }}">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Modale --}}
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="confirmModalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{-- qui ci andrà il testo della modale --}}
            Do you really want to delete this comic?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="modalDeleteBtn">Delete</button>
        </div>
      </div>
    </div>
</div>
@endsection
