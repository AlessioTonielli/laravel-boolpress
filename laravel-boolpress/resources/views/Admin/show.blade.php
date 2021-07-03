@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="card">
            <ul class="list-group">
                <li class="list-group-item text-capitalize">Titolo: {{ $post->title }}</li>
                <li class="list-group-item text-capitalize">Autore: {{ $post->user->name }}</li>
                <li class="list-group-item text-capitalize">Categoria: {{ $post->category ? $post->category->name : '-' }}</li>
                <li class="list-group-item text-capitalize">creato: {{ $post->created_at }}</li>
                <li class="list-group-item">Contenuto: {{ $post->content }}</li>
            </ul>
        </div>
    </div>

    <div class="row mb-4">
        @if(url()->previous() == route('admin.dashboard'))
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Torna Indietro</a>
        @elseif(url()->previous() == route('admin.index'))
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Torna Indietro</a>
        @endif
        <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-warning ml-3">Modifica</a>

        <form action="{{ route('admin.destroy', ['id' => $post->id]) }}" method="post">

            @csrf
            @method('DELETE')


            <input type="submit" value="Elimina" class="btn btn-danger ml-3">
        </form>
    </div>



</div>
@endsection
