@extends('layouts.app')

@section('content')

@foreach($posts as $post)

<div style="text-align: center">
    <h2>{{ $post->title }}</h2>
    <p>{{ $post->content }}</p>
<a href="{{ route('admin.show', ['id' => $post->id]) }}">Visualizza Post Completo</a>
{{-- <a href="{{ route('admin.destroy', ['id' => $post->id]) }}">Cancella Post</a>
<a href="{{ route('admin.edit', ['id' => $post->id]) }}">Modifica Post</a> --}}
</div>
    
@endforeach

@endsection