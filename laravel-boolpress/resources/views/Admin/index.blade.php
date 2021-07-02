@extends('layouts.app') 

@section('content')


    <div style="text-align: center">
    
        <a href="{{ route('admin.create') }}" class="btn btn-primary">Scrivi un post</a>

        @foreach($posts as $post)

        <div style="text-align: center; border: 1px solid black" >
            <h2>Titolo: {{ $post->title }}</h2>
            <h4>Autore: {{ $post->user->name }}</h4>
            <p>Testo: {{ $post->content }}</p>
            <p>Categoria: {{ $post->category ? $post->category->name : '-'}}</p>
            <a href="{{ route('admin.show', ['id' => $post->id]) }}">Visualizza Post Completo</a>
            {{-- <a href="{{ route('admin.destroy', ['id' => $post->id]) }}">Cancella Post</a>
            <a href="{{ route('admin.edit', ['id' => $post->id]) }}">Modifica Post</a> --}}
        </div>
    </div>


    @endforeach
@endsection


