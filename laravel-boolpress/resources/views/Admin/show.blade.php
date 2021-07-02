@extends('layouts.app')

@section('content')
<div style="text-align: center">
    <h1>{{ $post->title }}</h1>
    <h5>{{ $post->user->name }}</h5>
    <p>{{ $post->content }}</p>
    <a href="{{ route('admin.index') }}" class="btn btn-primary">Torna Indietro</a>

    <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-primary">Modifica</a>

    <form action="{{ route('admin.destroy', ['id' => $post->id]) }}" method="post">
    
    @csrf
    @method('DELETE')


    <input type="submit" value="Elimina" class="btn btn-primary">    
    </form>


</div>
@endsection