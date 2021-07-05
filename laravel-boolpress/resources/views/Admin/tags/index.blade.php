@extends('layouts.app')

@section('content')


<div class="container">
    {{-- <div class="row mb-3">
        <a href="{{ route('admin.create') }}" class="btn text-capitalize btn-primary">Scrivi un post</a>
    </div> --}}

    @foreach($tags as $tag)
    <div class="row mb-3">

        <div class="card p-3 mb-3 col-12">
            <h3 class="text-capitalize">{{ $tag->name }}</h3>
            {{-- <p>Testo: {{ $post->content }}</p> --}}
            <div class="row">
                <div class="col-3">
                    <h4 class="text-capitalize">slug: {{ $tag->slug }}</h4>
                </div>
                {{-- <div class="col-3">
                    <h4 class="text-capitalize">Categoria: {{ $post->category ? $post->category->name : '-'}}</h4>
                </div>
            </div>
            <div class="row pl-3 pr-3">
                <a href="{{ route('admin.show', ['id' => $post->id]) }}" class="btn text-capitalize btn-primary">Visualizza Post Completo</a>
            </div> --}}
        </div>
    </div>


    @endforeach

</div>
@endsection
