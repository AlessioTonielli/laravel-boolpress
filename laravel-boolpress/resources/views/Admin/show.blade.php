@extends('layouts.app')

@section('content')
<div style="text-align: center">
    <h1>Titolo: {{ $post->title }}</h1>
    <h5>Autore: {{ $post->user->name }}</h5>
    <p>Contenuto: {{ $post->content }}</p>
    <h4>Categoria: {{ $post->category ? $post->category->name : '-' }}</h4>
    <a href="{{ route('admin.index') }}" class="btn btn-primary">Torna Indietro</a>

    <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-primary">Modifica</a>

    <form action="{{ route('admin.destroy', ['id' => $post->id]) }}" method="post">
    
    @csrf
    @method('DELETE')


    <input type="submit" value="Elimina" class="btn btn-primary">    
    </form>


</div>
@endsection