@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mb-4">
        @if(url()->previous() == route('admin.private'))
        <a href="{{ route('admin.private') }}" class="btn btn-primary">Torna Indietro</a>
        @elseif(url()->previous() == route('admin.index'))
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Torna Indietro</a>
        @elseif(url()->previous() == route('guest.index'))
        <a href="{{ route('guest.index') }}" class="btn btn-primary">Torna Indietro</a>
        @endif
    </div>

    <div class="row mb-2">
        <div class="col-12">
            <ul class="list-group">
                <li class="list-group-item text-capitalize">Titolo: {{ $post->title }}</li>
                <li class="list-group-item text-capitalize">Autore: {{ $post->user->name }}</li>
                <li class="list-group-item text-capitalize">Categoria: {{ $post->category ? $post->category->name : '-' }}</li>
                <li class="list-group-item text-capitalize">creato in data: {{ $post->created_at }}</li>
                <li class="list-group-item">Testo:<br>{{ $post->content }}</li>
            </ul>
        </div>
    </div>





</div>
@endsection
