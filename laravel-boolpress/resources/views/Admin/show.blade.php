@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        @if(url()->previous() == route('admin.private'))
        <a href="{{ route('admin.private') }}" class="btn text-capitalize btn-primary">Torna alla tua area privata</a>
        @elseif(url()->previous() == route('admin.index'))
        <a href="{{ route('admin.index') }}" class="btn text-capitalize btn-primary">Torna ai post</a>
        @else
        @guest
        <a href="{{ route('guest.index') }}" class="btn text-capitalize btn-primary">Torna ai post</a>
        @else
        <a href="{{ route('admin.index') }}" class="btn text-capitalize btn-primary">Torna ai post</a>

        @endif
        @endif
    </div>

    <div class="row mb-2">
        <div class="col-12">
        <div>
        @if(isset($post->cover_url))
        <img src="{{ $post->cover_url ? asset('storage/' . $post->cover_url) : ''}}" class="img-fluid rounded-start" alt="..." style="max-height:150px;width: 100%; object-fit: cover">
        @endif
        </div>
            <ul class="list-group">
                <li class="list-group-item text-capitalize">Titolo: {{ $post->title }}</li>
                <li class="list-group-item text-capitalize">Autore: {{ $post->user->name }}</li>
                <li class="list-group-item text-capitalize">Categoria: {{ $post->category ? $post->category->name : '-' }}</li>
                <li class="list-group-item text-capitalize">Tags: 
                @foreach($post->tags as $tag)
                <span class="badge badge-primary">{{ $tag->name }}</span>
                    
                @endforeach
                
                
                </li>

                <li class="list-group-item text-capitalize">creato in data: {{ $post->created_at }}</li>
                <li class="list-group-item">Testo:<br>{{ $post->content }}</li>
            </ul>
        </div>
    </div>

    <div class="row mb-4">
        <a href="{{ route('admin.edit', $post->id) }}" class="btn text-capitalize btn-warning mr-3">Modifica</a>

        <form action="{{ route('admin.destroy', ['id' => $post->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Elimina" class="btn text-capitalize btn-danger mr-3">
        </form>
    </div>



</div>
@endsection
