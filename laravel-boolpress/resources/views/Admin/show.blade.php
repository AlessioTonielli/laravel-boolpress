@extends('layouts.app')

@section('content')
<div style="text-align: center">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('admin.index') }}" class="btn btn-primary">Torna Indietro</a>
    <a href="{{ route('admin.edit', ['id' => $post->id]) }}" class="btn btn-primary">Modifica</a>
    <a href="{{ route('admin.destroy', ['id' => $post->id]) }}" class="btn btn-primary">Elimina</a>


</div>
@endsection