@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row mb-3">
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Scrivi un post</a>
    </div>

    @foreach($posts as $post)
    <div class="row mb-3">

        <div class="card p-3 mb-3">
            <h3 class="text-capitalize">{{ $post->title }}</h3>
            <p>Testo: {{ $post->content }}</p>
            <div class="row">
                <div class="col-3">
                    <h4 class="text-capitalize">Autore: {{ $post->user->name }}</h4>
                </div>
                <div class="col-3">
                    <h4 class="text-capitalize">Categoria: {{ $post->category ? $post->category->name : '-'}}</h4>
                </div>
            </div>
            <div class="row pl-3 pr-3">
                <a href="{{ route('admin.show', ['id' => $post->id]) }}" class="btn btn-primary">Visualizza Post Completo</a>
            </div>
            {{-- <a href="{{ route('admin.destroy', ['id' => $post->id]) }}">Cancella Post</a>
            <a href="{{ route('admin.edit', ['id' => $post->id]) }}">Modifica Post</a> --}}
        </div>
    </div>


    @endforeach

</div>
@endsection
